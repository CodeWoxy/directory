@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

@extends('admin.nav')


     <!-- Navigation -->

<div id="page-wrapper">
    <div class="graphs">
        <div class="md">
            <h3>Sub Categories</h3>
            <div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
                <div class="panel-body no-padding">
                    <table id='table' class="table table-striped">
                        <thead>
                            <tr class="warning">
                                <th>#</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($company as $k=>$c)
                            <tr>
                                <td>{{$k+1}}</td>
                                <td>{{$c->name}}</td>
                                <td>{{$c->category['name']}}</td>
                                <td>
                                    <a class="flex items-center mr-3" href="{{ url("admin/subcategory/update/".$c->id) }}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                    <a class="flex items-center text-theme-6" href="javascript:;" onclick="deleteIt({{$c->id}})"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.table').dataTable();
        @if(session('success'))
            $.alert('{{ session("success") }}', 'Success');
        @endif
        @if(session('error'))
            $.alert('{{ session("error") }}', 'Error');
        @endif
    })

    function deleteIt(id){
        $.confirm({
            title: 'Delete Confirm!',
            content: 'Do you really want to delete these records? This process cannot be undone.',
            buttons: {
                confirm: {
                    text: 'Delete',
                    btnClass: 'btn-red',
                    keys: ['enter'],
                    action: function(){

                        window.location.href = "{{ url('admin/subcategory/delete/') }}/"+id
                    }
                },
                cancel: function () {
                    console.log('Canceled!');
                },
            }
        });
    }
</script>

@endsection
