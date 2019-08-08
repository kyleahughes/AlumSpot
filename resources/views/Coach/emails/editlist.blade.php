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
                                    <th>User</th>
                                    <th>Email</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if($alumni->count() === 0)
                                    <tr><td>There are currently no alumni registered</td></tr>
                                @else
                                    @foreach($alumni as $alumnis)
                                    <tr>
                                        <td><img class="img-circle" height="30" src="/alumni/{{ $alumnis->avatar }}" alt="User Avatar">{{ $alumnis->first_name }} {{ $alumnis->last_name }}&emsp;</td>
                                        <td>{{ $alumnis->email }}</td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>

                            <tfoot>
                                <tr>
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
                    <div class="row">
                        <div class="box-header">
                            <div class="col-md-9">
                            <h3 class="box-title">Additional Addresses</h3>
                            </div>
                            <div class="col-md-3 pull-right">
                            <a data-toggle="modal" data-target="#addEmail" class="btn btn-primary btn-block margin-bottom">Add Emails</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Group</th>
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
                                            <td>{{ $elists->group }}</td>
                                            <td></td>
                                            <td class="pull-right-container"><a onclick="return confirm('Are you sure you want to delete this email address?')" href="/coach/delete/elist/{{ $elists->id }}" style="color: red;"><i class="fas fa-trash-alt"></i></a></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th></th>
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
        
        <!-- MODAL -->
        <div class="modal fade" id="addEmail">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="box box-info">
                <form action="/coach/email/add" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <div class="row col-md-12">
                            <div class="form-group">
                                <h3 class="modal-title">Add Email Addresses</h3>
                            </div>
                            <div class="form-group">
                              <ol>
                                <li class='form-group'>Select the group you want these emails to be saved under.</li>
                                <li class='form-group'>Enter each each email separated by ', ' (i.e example@aol.com, alumspot@aol.com, baseball@aol.com, ....)</li>
                                <li class='form-group'>Click 'Add' to add save these emails to your mailing list!</li>
                              </ol>
                            </div>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="group">Assign these emails to a group</label>
                                <select name="group" class="form-control">
                                    <option selected disabled>Select</option>
                                    <option value="Alumni">Alumni</option>
                                    <option value="Acquaintance">Acquaintance</option>
                                </select>
                            </div>
                            <div class="form-group">
                              <textarea class="textarea" placeholder="example@aol.com, alumspot@aol.com, baseball@aol.com, ...." name="email" type="email"
                                        style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                            @include('errors')
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="pull-right btn btn-lg btn-primary">Send</button>
                    </div>
                </form>
              </div>
              <!-- /.box -->
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        
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