<style>
    a:hover {
        color: #fff;
    }
</style>
<form method="get" role="search">
    <div class="input-group col-2 mb-2">
        <input type="search" class="form-control rounded" placeholder="ค้นหา" aria-label="Search" aria-describedby="search-addon" name="search">
        <button type="submit" class="btn btn-dark text-white" value="{{ old('search') }}">ค้นหา</button>
        <button type="reset" class="btn btn-danger text-white">
            <a href="{{ url('teacher/classroom') }}">รีเซ็ต</a>
        </button>
    </div>
</form>