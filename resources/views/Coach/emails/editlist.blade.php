@extends('Coach.layouts.master')

@section('content')
    <section class="content-header">
        <h1>
            Email List
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Registered Users</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Name</th>
                                    <th>Icon</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if($alumni->count() === 0)
                                    <tr><td>There are currently no alumni registered</td></tr>
                                @else
                                    @foreach($alumni as $alumnis)
                                        <tr>
                                            <td>{{ $alumnis->email }}</td>
                                            <td>{{ $alumnis->first_name }} {{ $alumnis->last_name }}</td>
                                            <td><img class="img-circle" src="/alumni/{{ $alumnis->avatar }}" alt="User Avatar"></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Other Addresses</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if($elist->count() === 0)
                                    <tr><td>You have not added any emails. Please click above to add emails so you can get started!</td></tr>
                                @else
                                    @foreach($elist as $elists)
                                        <tr>
                                            <td>{{ $elists->email }}</td>
                                            <td></td>
                                            <td class="pull-right-container"><a onclick="return confirm('Are you sure you want to delete this event?')" href="/coach/delete/elist/{{ $elists->id }}" style="color: red;"><i class="fas fa-trash-alt"></i></a></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

    <script>
      $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
        })
       })
    </script>
  @endsection