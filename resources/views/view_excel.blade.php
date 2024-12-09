@extends('admin.body.adminmaster')

@section('admin')
<div class="page-wrapper">
    <div class="container-fluid">
        
        <!---->
        
        <div class="container">
            <div class="row">
                <form action="{{route('excel_upload')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="file">Upload Excel File:</label>
                    <input type="file" name="file" id="file" required>
                    <button type="submit">Upload</button>
                </form>
            </div>
        </div>
        
        
         <!---->
            
        </div>
</div>
@endsection


