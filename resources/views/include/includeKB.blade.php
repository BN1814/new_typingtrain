<link rel="stylesheet" href="{{ asset('css/keyboard.css') }}">
<div class="container mt-4 d-block text-center">
    <div class="row">
        <div class="col-sm">
            <button type="button" class="keys" id="~">~</button>
            <button type="button" class="keys" id="1">1</button>
            <button type="button" class="keys" id="2">2</button>
            <button type="button" class="keys" id="3">3</button>
            <button type="button" class="keys" id="4">4</button>
            <button type="button" class="keys" id="5">5</button>
            <button type="button" class="keys" id="6">6</button>
            <button type="button" class="keys" id="7">7</button>
            <button type="button" class="keys" id="8">8</button>
            <button type="button" class="keys" id="9">9</button>
            <button type="button" class="keys" id="0">0</button>
            <button type="button" class="keys" id="-">-</button>
            <button type="button" class="keys" id="=">=</button>
            <button type="button" class="keys backspace_key" id="backspace">Backspace</button>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-sm">
            <button type="button" class="keys tab_key" id="tab">tabs</button>
            <button type="button" class="keys" id="q">Q</button>
            <button type="button" class="keys" id="w">W</button>
            <button type="button" class="keys" id="e">E</button>
            <button type="button" class="keys" id="r">R</button>
            <button type="button" class="keys" id="t">T</button>
            <button type="button" class="keys" id="y">Y</button>
            <button type="button" class="keys" id="u">U</button>
            <button type="button" class="keys" id="i">I</button>
            <button type="button" class="keys" id="o">O</button>
            <button type="button" class="keys" id="p">P</button>
            <button type="button" class="keys" id="[">{</button>
            <button type="button" class="keys" id="]">}</button>
            <button type="button" class="keys slash_key" id="slash">\</button>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-sm">
            <button type="button" class="keys caps_lock_key" id="capLock">Caps Lock</button>
            <button type="button" class="keys" id="a">A</button>
            <button type="button" class="keys" id="s">S</button>
            <button type="button" class="keys" id="d">D</button>
            <button type="button" class="keys" id="f">F</button>
            <button type="button" class="keys" id="g">G</button>
            <button type="button" class="keys" id="h">H</button>
            <button type="button" class="keys" id="j">J</button>
            <button type="button" class="keys" id="k">K</button>
            <button type="button" class="keys" id="l">L</button>
            <button type="button" class="keys" id=";">;</button>
            <button type="button" class="keys" id="'">"</button>
            <button type="button" class="keys enter_key" id="enter">Enter</button>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-sm">
            <button type="button" class="keys shift_key shift_left" id="shift">Shift</button>
            <button type="button" class="keys" id="z">Z</button>
            <button type="button" class="keys" id="x">X</button>
            <button type="button" class="keys" id="c">C</button>
            <button type="button" class="keys" id="v">V</button>
            <button type="button" class="keys" id="b">B</button>
            <button type="button" class="keys" id="n">N</button>
            <button type="button" class="keys" id="m">M</button>
            <button type="button" class="keys" id=",">,</button>
            <button type="button" class="keys" id=".">.</button>
            <button type="button" class="keys" id="/">/</button>
            <button type="button" class="keys shift_key shift_right" id="shift">Shift</button>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-sm">
            <button type="button" class="keys ctrl_key ctrl_left" id="ctrl">Ctrl</button>
            {{-- <button type="button" class="keys alt_key alt_left" id="alt">Alt</button> --}}
            <button type="button" class="keys space_key" id="spacebar">SpaceBar</button>
            {{-- <button type="button" class="keys alt_key alt_right" id="alt">Alt</button> --}}
            <button type="button" class="keys ctrl_key ctrl_right" id="ctrl">Ctrl</button>
        </div>
    </div>
    <audio id="audio" controls style="display:none">
        <source src="https://www.zapsplat.com/wp-content/uploads/2015/sound-effects-14566/zapsplat_technology_computer_apple_magic_keyboard_key_press_001_17520.mp3" type="audio/mpeg">
    </audio>
</div>
