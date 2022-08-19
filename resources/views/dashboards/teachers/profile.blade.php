@extends('layouts.app')

@section('content')
<style>
  .container {
    position: relative;
  }
  .card-2 {
    position: absolute;
    right: 0;
    top: 0;
  }
  .form-control {
    width: 330px;
  }
  .col-md-6 input {
    width: 100%;
  }
</style>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 mb-2">
          <div class="card card-1">
            <div class="card-header h4 bg-dark text-center text-white">ข้อมูลส่วนตัว</div>
            <div class="card-body">
              <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row mb-3">
                      <label for="stdid" class="col-md-4 col-form-label text-md-end">{{ __('รหัสนักศึกษา') }}</label>

                      <div class="col-md-6">
                        <input type="text" class="form-control text-center" value="{{ Auth::user()->userid }}" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ชื่อผู้ใช้งาน') }}</label>

                      <div class="col-md-6">
                        <input type="text" class="form-control text-center" value="{{ Auth::user()->name }}" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('นามสกุลผู้ใช้งาน') }}</label>

                      <div class="col-md-6">
                        <input type="text" class="form-control text-center" value="{{ Auth::user()->lname }}" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('อีเมลผู้ใช้งาน') }}</label>

                      <div class="col-md-6">
                        <input type="text" class="form-control text-center" value="{{ Auth::user()->email }}" disabled>
                      </div>
                    </div>
                </div>
                <div class="col-4">
                  <button type="submit" class="btn btn-warning" style="width: 245px;">
                      {{ __('แก้ไข') }}
                  </button>
              </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-8">
          <div class="card">
            <div class="card-header h3 text-white text-center bg-dark">Test Data</div>
            <div class="card-body">
              
                <table class="table table-bordered table-striped">
                  <tr>
                    <th>Name</th>
                    <th>Wpm</th>
                  </tr>
                  @foreach ($users as $user)
                    @foreach ($users->history_score as $history_score)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $history_score->wpm }}</td>
                    </tr>
                    @endforeach
                  @endforeach
                </table>
              
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection