<div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="/penerbangan" class="simple-text logo-mini">
          <!-- <div class="logo-image-small">
            <img src="./assets/img/logo-small.png">
          </div> -->
          <!-- <p>CT</p> -->
        </a>
        <a href="/penerbangan" class="simple-text logo-normal">
          Data Penerbangan
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="{{ route('penerbangan.index') }}">
              <i class="nc-icon nc-send"></i>
              <p>Penerbangan</p>
            </a>
          </li>
          <li>
            <a href="{{ route('foo.index') }}">
              <i class="nc-icon nc-single-02"></i>
              <p>FOO</p>
            </a>
          </li>
          {{-- <li>
            <a href="javascript:;">
              <i class="nc-icon nc-bank"></i>
              <p>Perusahaan</p>
            </a>
          </li> --}}
        </ul>
      </div>
    </div>