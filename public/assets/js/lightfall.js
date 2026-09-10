/*!
 * Lightfall — vanilla JS / raw WebGL port (no React, no bundler, no "ogl" dependency)
 * Ported 1:1 from the React Bits "Lightfall" component — same GLSL shader, same uniforms.
 *
 * Usage (plain <script>, e.g. inside a Blade layout):
 *
 *   <div id="hero-bg" style="position:absolute; inset:0;"></div>
 *   <script type="module">
 *     import { Lightfall } from '/js/lightfall.js';
 *     const fx = new Lightfall(document.getElementById('hero-bg'), {
 *       colors: ['#A6C8FF', '#5227FF', '#FF9FFC'],
 *       backgroundColor: '#0A29FF',
 *       speed: 0.5,
 *       streakCount: 2,
 *     });
 *     // fx.destroy() to tear down (e.g. on SPA navigation)
 *   </script>
 *
 * If you're not using ES modules, delete the two "export" keywords below
 * and just include this file with a normal <script src="..."></script> —
 * `Lightfall` will be a plain global then.
 */

const VERTEX = `
attribute vec2 position;
attribute vec2 uv;
varying vec2 vUv;
void main() {
  vUv = uv;
  gl_Position = vec4(position, 0.0, 1.0);
}
`;

const FRAGMENT = `
precision highp float;

uniform vec3  iResolution;
uniform vec2  iMouse;
uniform float iTime;

uniform vec3  uColor0;
uniform vec3  uColor1;
uniform vec3  uColor2;
uniform vec3  uColor3;
uniform vec3  uColor4;
uniform vec3  uColor5;
uniform vec3  uColor6;
uniform vec3  uColor7;
uniform int   uColorCount;

uniform vec3  uBgColor;
uniform vec3  uMouseColor;
uniform float uSpeed;
uniform int   uStreakCount;
uniform float uStreakWidth;
uniform float uStreakLength;
uniform float uGlow;
uniform float uDensity;
uniform float uTwinkle;
uniform float uZoom;
uniform float uBgGlow;
uniform float uOpacity;
uniform float uMouseEnabled;
uniform float uMouseStrength;
uniform float uMouseRadius;
uniform float uLightMode;

varying vec2 vUv;

vec3 palette(float h) {
  int count = uColorCount;
  if (count < 1) count = 1;
  int idx = int(floor(clamp(h, 0.0, 0.999999) * float(count)));
  if (idx <= 0) return uColor0;
  if (idx == 1) return uColor1;
  if (idx == 2) return uColor2;
  if (idx == 3) return uColor3;
  if (idx == 4) return uColor4;
  if (idx == 5) return uColor5;
  if (idx == 6) return uColor6;
  return uColor7;
}

vec3 tanhv(vec3 x) {
  vec3 e = exp(-2.0 * x);
  return (1.0 - e) / (1.0 + e);
}

vec2 sceneC(vec2 frag, vec2 r) {
  vec2 P = (frag + frag - r) / r.x;
  float z = 0.0;
  float d = 1e3;
  vec4 O = vec4(0.0);
  for (int k = 0; k < 39; k++) {
    if (d <= 1e-4) break;
    O = z * normalize(vec4(P, uZoom, 0.0)) - vec4(0.0, 4.0, 1.0, 0.0) / 4.5;
    d = 1.0 - sqrt(length(O * O));
    z += d;
  }
  return vec2(O.x, atan(O.z, O.y));
}

void mainImage(out vec4 o, vec2 C) {
  vec2 r = iResolution.xy;
  vec2 uv0 = (C + C - r) / r.x;
  float T = 0.1 * iTime * uSpeed + 9.0;
  float angRings = max(1.0, floor(6.28318530718 * max(uDensity, 0.05) + 0.5));
  vec2 Y = vec2(5e-3, 6.28318530718 / angRings);

  vec2 c0 = sceneC(C, r);
  vec2 cdx = sceneC(C + vec2(1.0, 0.0), r);
  vec2 cdy = sceneC(C + vec2(0.0, 1.0), r);
  vec2 dCx = cdx - c0;
  vec2 dCy = cdy - c0;
  dCx.y -= 6.28318530718 * floor(dCx.y / 6.28318530718 + 0.5);
  dCy.y -= 6.28318530718 * floor(dCy.y / 6.28318530718 + 0.5);
  vec2 fw = abs(dCx) + abs(dCy);
  C = c0;

  vec2 P = vec2(2.0, 1.0) * uv0 - (r / r.x) * vec2(0.0, 1.0);
  vec4 O = uLightMode > 0.5
    ? vec4(0.0)
    : vec4(uBgColor * 90.0 * uBgGlow / (1e3 * dot(P, P) + 6.0), 0.0);

  float mGlow = 0.0;
  if (uMouseEnabled > 0.5) {
    vec2 mN = (iMouse + iMouse - r) / r.x;
    float md = length(uv0 - mN);
    mGlow = exp(-md * md / max(uMouseRadius * uMouseRadius, 1e-4)) * uMouseStrength;
    O.rgb += uMouseColor * mGlow * 0.25;
  }

  float zr = 5e-4 * uStreakWidth;
  vec2 rr = vec2(max(length(fw), 1e-5));
  float tail = 19.0 / max(uStreakLength, 0.05);

  for (int m = 0; m < 16; m++) {
    if (m >= uStreakCount) break;
    float jf = float(m) + 1.0;
    float ic = fract(sin(dot(vec2(jf, floor(C.x / Y.x + 0.5)), vec2(7.0, 11.0)) * 73.0));
    vec2 Pp = C - (T + T * ic) * vec2(0.0, 1.0);
    Pp -= floor(Pp / Y + 0.5) * Y;
    float h = fract(8663.0 * ic);
    vec3 col = palette(h);
    float weight = mix(1.5, 1.0 + sin(T + 7.0 * h + 4.0), uTwinkle);
    weight *= (1.0 + mGlow * 2.0);
    vec2 inner = vec2(length(max(Pp, vec2(-1.0, 0.0))), length(Pp) - zr) - zr;
    vec2 sm = vec2(1.0) - smoothstep(-rr, rr, inner);
    O.rgb += dot(sm, vec2(exp(tail * Pp.y), 3.0)) * col * weight;
    C.x += Y.x / 8.0;
  }

  vec3 colr = sqrt(tanhv(max(O.rgb * uGlow - vec3(0.04, 0.08, 0.02), 0.0)));
if (uLightMode > 0.5) {
  float peak = max(colr.r, max(colr.g, colr.b));
  float coverage = smoothstep(0.035, 0.58, peak) * uOpacity;
  vec3 chroma = clamp(colr / max(peak, 1e-4), 0.0, 1.0);
  chroma = pow(chroma, vec3(1.35));
  float chromaPeak = max(chroma.r, max(chroma.g, chroma.b));
  chroma /= max(chromaPeak, 1e-4);
  o = vec4(mix(vec3(1.0), chroma, coverage * 0.94), 1.0);
} else {
    o = vec4(colr, uOpacity);
  }
}

void main() {
  vec4 color;
  mainImage(color, vUv * iResolution.xy);
  gl_FragColor = color;
}
`;

const MAX_COLORS = 8;
const UNIFORM_NAMES = [
  'iResolution', 'iMouse', 'iTime',
  'uColor0', 'uColor1', 'uColor2', 'uColor3', 'uColor4', 'uColor5', 'uColor6', 'uColor7', 'uColorCount',
  'uBgColor', 'uMouseColor', 'uSpeed', 'uStreakCount', 'uStreakWidth', 'uStreakLength',
  'uGlow', 'uDensity', 'uTwinkle', 'uZoom', 'uBgGlow', 'uOpacity',
  'uMouseEnabled', 'uMouseStrength', 'uMouseRadius', 'uLightMode'
];

function hexToRGB(hex) {
  const c = String(hex).replace('#', '').padEnd(6, '0');
  return [
    parseInt(c.slice(0, 2), 16) / 255,
    parseInt(c.slice(2, 4), 16) / 255,
    parseInt(c.slice(4, 6), 16) / 255
  ];
}

function prepColors(input) {
  const base = (input && input.length ? input : ['#A6C8FF', '#5227FF', '#FF9FFC']).slice(0, MAX_COLORS);
  const count = base.length;
  const arr = [];
  for (let i = 0; i < MAX_COLORS; i++) arr.push(hexToRGB(base[Math.min(i, base.length - 1)]));
  const avg = [0, 0, 0];
  for (let i = 0; i < count; i++) {
    avg[0] += arr[i][0];
    avg[1] += arr[i][1];
    avg[2] += arr[i][2];
  }
  avg[0] /= count;
  avg[1] /= count;
  avg[2] /= count;
  return { arr, count, avg };
}

export class Lightfall {
  constructor(container, options = {}) {
    if (!container) throw new Error('Lightfall: container element is required');
    this.container = container;

    this.opts = Object.assign({
      colors: ['#A6C8FF', '#5227FF', '#FF9FFC'],
      backgroundColor: '#0A29FF',
      speed: 0.5,
      streakCount: 2,
      streakWidth: 1,
      streakLength: 1,
      glow: 1,
      density: 0.6,
      twinkle: 1,
      zoom: 3,
      backgroundGlow: 0.5,
      opacity: 1,
      mouseInteraction: true,
      mouseStrength: 0.5,
      mouseRadius: 1,
      mouseDampening: 0.15,
      lightMode: false,
      paused: false,
      dpr: (typeof window !== 'undefined' ? (window.devicePixelRatio || 1) : 1)
    }, options);

    this._mouseTarget = [0, 0];
    this._mouseCurrent = [0, 0];
    this._lastTime = 0;
    this._raf = null;

    this._initGL();
    this._initGeometry();
    this._initProgram();
    this._applyColors();
    this._bindEvents();
    this._resize();
    this._raf = requestAnimationFrame((t) => this._loop(t));
  }

  _initGL() {
    const canvas = document.createElement('canvas');
    canvas.style.width = '100%';
    canvas.style.height = '100%';
    canvas.style.display = 'block';
    this.container.appendChild(canvas);
    this.canvas = canvas;

    const gl = canvas.getContext('webgl', { alpha: true, antialias: true, premultipliedAlpha: true }) ||
               canvas.getContext('experimental-webgl', { alpha: true, antialias: true });
    if (!gl) throw new Error('Lightfall: WebGL is not supported in this browser');
    this.gl = gl;
  }

  _initGeometry() {
    const gl = this.gl;
    // one oversized triangle covering the whole viewport (no quad needed)
    const positions = new Float32Array([-1, -1, 3, -1, -1, 3]);
    const uvs = new Float32Array([0, 0, 2, 0, 0, 2]);

    this.posBuffer = gl.createBuffer();
    gl.bindBuffer(gl.ARRAY_BUFFER, this.posBuffer);
    gl.bufferData(gl.ARRAY_BUFFER, positions, gl.STATIC_DRAW);

    this.uvBuffer = gl.createBuffer();
    gl.bindBuffer(gl.ARRAY_BUFFER, this.uvBuffer);
    gl.bufferData(gl.ARRAY_BUFFER, uvs, gl.STATIC_DRAW);
  }

  _compileShader(type, src) {
    const gl = this.gl;
    const shader = gl.createShader(type);
    gl.shaderSource(shader, src);
    gl.compileShader(shader);
    if (!gl.getShaderParameter(shader, gl.COMPILE_STATUS)) {
      const info = gl.getShaderInfoLog(shader);
      gl.deleteShader(shader);
      throw new Error('Lightfall: shader compile error — ' + info);
    }
    return shader;
  }

  _initProgram() {
    const gl = this.gl;
    const vs = this._compileShader(gl.VERTEX_SHADER, VERTEX);
    const fs = this._compileShader(gl.FRAGMENT_SHADER, FRAGMENT);

    const program = gl.createProgram();
    gl.attachShader(program, vs);
    gl.attachShader(program, fs);
    gl.linkProgram(program);
    if (!gl.getProgramParameter(program, gl.LINK_STATUS)) {
      throw new Error('Lightfall: program link error — ' + gl.getProgramInfoLog(program));
    }
    this.program = program;

    this.attribs = {
      position: gl.getAttribLocation(program, 'position'),
      uv: gl.getAttribLocation(program, 'uv')
    };

    this.uniforms = {};
    UNIFORM_NAMES.forEach((name) => {
      this.uniforms[name] = gl.getUniformLocation(program, name);
    });
  }

  _applyColors() {
    const { arr, count, avg } = prepColors(this.opts.colors);
    this._colorArr = arr;
    this._colorCount = count;
    this._mouseColor = avg;
  }

  _bindEvents() {
    this._ro = new ResizeObserver(() => this._resize());
    this._ro.observe(this.container);

    if (this.opts.mouseInteraction) {
      this._onPointerMove = (e) => {
        const rect = this.canvas.getBoundingClientRect();
        const scale = this.opts.dpr || 1;
        const x = (e.clientX - rect.left) * scale;
        const y = (rect.height - (e.clientY - rect.top)) * scale;
        this._mouseTarget = [x, y];
        if (this.opts.mouseDampening <= 0) this._mouseCurrent = [x, y];
      };
      this.canvas.addEventListener('pointermove', this._onPointerMove);
    }
  }

  _resize() {
    const rect = this.container.getBoundingClientRect();
    const dpr = this.opts.dpr || 1;
    const w = Math.max(1, Math.round(rect.width * dpr));
    const h = Math.max(1, Math.round(rect.height * dpr));
    if (this.canvas.width !== w || this.canvas.height !== h) {
      this.canvas.width = w;
      this.canvas.height = h;
    }
    this.gl.viewport(0, 0, w, h);
    this._resolution = [w, h, 1];
  }

  _loop(t) {
    this._raf = requestAnimationFrame((tt) => this._loop(tt));
    const time = t * 0.001;

    if (this.opts.mouseDampening > 0) {
      if (!this._lastTime) this._lastTime = t;
      const dt = (t - this._lastTime) / 1000;
      this._lastTime = t;
      const tau = Math.max(1e-4, this.opts.mouseDampening);
      let factor = 1 - Math.exp(-dt / tau);
      if (factor > 1) factor = 1;
      this._mouseCurrent[0] += (this._mouseTarget[0] - this._mouseCurrent[0]) * factor;
      this._mouseCurrent[1] += (this._mouseTarget[1] - this._mouseCurrent[1]) * factor;
    } else {
      this._lastTime = t;
    }

    if (!this.opts.paused) this._render(time);
  }

  _render(time) {
    const gl = this.gl;
    gl.useProgram(this.program);

    gl.bindBuffer(gl.ARRAY_BUFFER, this.posBuffer);
    gl.enableVertexAttribArray(this.attribs.position);
    gl.vertexAttribPointer(this.attribs.position, 2, gl.FLOAT, false, 0, 0);

    gl.bindBuffer(gl.ARRAY_BUFFER, this.uvBuffer);
    gl.enableVertexAttribArray(this.attribs.uv);
    gl.vertexAttribPointer(this.attribs.uv, 2, gl.FLOAT, false, 0, 0);

    const u = this.uniforms;
    gl.uniform3fv(u.iResolution, this._resolution);
    gl.uniform2fv(u.iMouse, this._mouseCurrent);
    gl.uniform1f(u.iTime, time);

    ['uColor0', 'uColor1', 'uColor2', 'uColor3', 'uColor4', 'uColor5', 'uColor6', 'uColor7'].forEach((n, i) => {
      gl.uniform3fv(u[n], this._colorArr[i]);
    });
    gl.uniform1i(u.uColorCount, this._colorCount);

    gl.uniform3fv(u.uBgColor, hexToRGB(this.opts.backgroundColor));
    gl.uniform3fv(u.uMouseColor, this._mouseColor);
    gl.uniform1f(u.uSpeed, this.opts.speed);
    gl.uniform1i(u.uStreakCount, Math.max(1, Math.min(16, Math.round(this.opts.streakCount))));
    gl.uniform1f(u.uStreakWidth, this.opts.streakWidth);
    gl.uniform1f(u.uStreakLength, this.opts.streakLength);
    gl.uniform1f(u.uGlow, this.opts.glow);
    gl.uniform1f(u.uDensity, this.opts.density);
    gl.uniform1f(u.uTwinkle, this.opts.twinkle);
    gl.uniform1f(u.uZoom, this.opts.zoom);
    gl.uniform1f(u.uBgGlow, this.opts.backgroundGlow);
    gl.uniform1f(u.uOpacity, this.opts.opacity);
    gl.uniform1f(u.uMouseEnabled, this.opts.mouseInteraction ? 1 : 0);
    gl.uniform1f(u.uMouseStrength, this.opts.mouseStrength);
    gl.uniform1f(u.uMouseRadius, this.opts.mouseRadius);
    gl.uniform1f(u.uLightMode, this.opts.lightMode ? 1 : 0);

    gl.clearColor(0, 0, 0, 0);
    gl.clear(gl.COLOR_BUFFER_BIT);
    gl.enable(gl.BLEND);
    gl.blendFunc(gl.SRC_ALPHA, gl.ONE_MINUS_SRC_ALPHA);
    gl.drawArrays(gl.TRIANGLES, 0, 3);
  }

  /** Update one or more options live (e.g. from a color picker). */
  update(options = {}) {
    Object.assign(this.opts, options);
    if (options.colors) this._applyColors();
  }

  setPaused(paused) {
    this.opts.paused = paused;
  }

  destroy() {
    if (this._raf) cancelAnimationFrame(this._raf);
    if (this._ro) this._ro.disconnect();
    if (this._onPointerMove) this.canvas.removeEventListener('pointermove', this._onPointerMove);
    const gl = this.gl;
    const ext = gl && gl.getExtension('WEBGL_lose_context');
    if (ext) ext.loseContext();
    if (this.canvas && this.canvas.parentElement === this.container) {
      this.container.removeChild(this.canvas);
    }
  }
}

// Also expose as a global for plain <script src="..."> usage (no type="module").
if (typeof window !== 'undefined') {
  window.Lightfall = Lightfall;
}