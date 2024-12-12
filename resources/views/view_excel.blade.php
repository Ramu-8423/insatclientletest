@extends('admin.body.adminmaster')

@section('admin')
<div class="page-wrapper">
    <div class="container-fluid">
        
        
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        
        <div class="container">
            <div class="row">
                <form action="{{route('excel_upload')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="file">Upload Excel File:</label>
                    <select name="project_type">
                        <option value="1">Address Verification</option>
                        <option value="2">Site Investigation</option>
                        <option value="3">Digital Address Verification</option>
                    </select>
                    <input type="file" name="file" id="file" required>
                    <button type="submit">Upload</button>
                </form>
            </div>
        </div>
        
        
         <!---->
            
        </div>
</div>
@endsection


