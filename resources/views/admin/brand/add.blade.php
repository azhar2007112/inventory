@extends('layouts.app')
@section('style')
    
@endsection
@section('content')
    
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Add Brand</h1>
        </div>
       
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
           
            <form action="" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label >Brand Name <span style="color:red">*</span></label>
                  <input type="text" class="form-control" required value="{{old('name')}}" name="name"  placeholder="Brand Name">

                </div>

                <div class="form-group">
                  <label >Slug <span style="color:red">*</span></label>
                  <input type="text" class="form-control" required value="{{old('slug')}}" name="slug"  placeholder="Slug Ex.URL">
                  <div style="color:red">{{$errors->first('slug')}}</div>
                </div>
               
                <div class="form-group">
                  <label >Status <span style="color:red">*</span></label>
                  <select class="form-control" name="status">
                    <option {{(old('status')==0)? 'selected' : ''}}  value="0">Active</option>
                    <option {{(old('status')==1)? 'selected' : ''}}  value="1">Inactive</option>
                  </select>
                     
                </div>
               
                <div class="form-group">
                  <label >Meta title <span style="color:red">*</span></label>
                  <input type="text" class="form-control" required value="{{old('meta_title')}}" name="meta_title"  placeholder="Meta title">
                </div>

                <div class="form-group">
                  <label >Meta description</label>
                  <input type="text" class="form-control" required value="{{old('meta_description')}}" name="meta_description"  placeholder="Meta description">
                </div>

                <div class="form-group">
                  <label >Meta keywords</label>
                  <input type="text" class="form-control" required value="{{old('meta_keywords')}}" name="meta_keywords"  placeholder="Meta keywords">
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

          <!-- general form elements -->

          <!-- /.card -->

        </div>
        <!-- /.col -->
        {{-- <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Simple Full Width Table</h3>

              <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Task</th>
                    <th>Progress</th>
                    <th style="width: 40px">Label</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1.</td>
                    <td>Update software</td>
                    <td>
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                      </div>
                    </td>
                    <td><span class="badge bg-danger">55%</span></td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td>Clean database</td>
                    <td>
                      <div class="progress progress-xs">
                        <div class="progress-bar bg-warning" style="width: 70%"></div>
                      </div>
                    </td>
                    <td><span class="badge bg-warning">70%</span></td>
                  </tr>
                  <tr>
                    <td>3.</td>
                    <td>Cron job running</td>
                    <td>
                      <div class="progress progress-xs progress-striped active">
                        <div class="progress-bar bg-primary" style="width: 30%"></div>
                      </div>
                    </td>
                    <td><span class="badge bg-primary">30%</span></td>
                  </tr>
                  <tr>
                    <td>4.</td>
                    <td>Fix and squish bugs</td>
                    <td>
                      <div class="progress progress-xs progress-striped active">
                        <div class="progress-bar bg-success" style="width: 90%"></div>
                      </div>
                    </td>
                    <td><span class="badge bg-success">90%</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Striped Full Width Table</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Task</th>
                    <th>Progress</th>
                    <th style="width: 40px">Label</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1.</td>
                    <td>Update software</td>
                    <td>
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                      </div>
                    </td>
                    <td><span class="badge bg-danger">55%</span></td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td>Clean database</td>
                    <td>
                      <div class="progress progress-xs">
                        <div class="progress-bar bg-warning" style="width: 70%"></div>
                      </div>
                    </td>
                    <td><span class="badge bg-warning">70%</span></td>
                  </tr>
                  <tr>
                    <td>3.</td>
                    <td>Cron job running</td>
                    <td>
                      <div class="progress progress-xs progress-striped active">
                        <div class="progress-bar bg-primary" style="width: 30%"></div>
                      </div>
                    </td>
                    <td><span class="badge bg-primary">30%</span></td>
                  </tr>
                  <tr>
                    <td>4.</td>
                    <td>Fix and squish bugs</td>
                    <td>
                      <div class="progress progress-xs progress-striped active">
                        <div class="progress-bar bg-success" style="width: 90%"></div>
                      </div>
                    </td>
                    <td><span class="badge bg-success">90%</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Responsive Hover Table</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Reason</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>183</td>
                    <td>John Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-success">Approved</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                  <tr>
                    <td>219</td>
                    <td>Alexander Pierce</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-warning">Pending</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                  <tr>
                    <td>657</td>
                    <td>Bob Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-primary">Approved</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                  <tr>
                    <td>175</td>
                    <td>Mike Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Fixed Header Table</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Reason</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>183</td>
                    <td>John Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-success">Approved</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                  <tr>
                    <td>219</td>
                    <td>Alexander Pierce</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-warning">Pending</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                  <tr>
                    <td>657</td>
                    <td>Bob Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-primary">Approved</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                  <tr>
                    <td>175</td>
                    <td>Mike Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                  <tr>
                    <td>134</td>
                    <td>Jim Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-success">Approved</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                  <tr>
                    <td>494</td>
                    <td>Victoria Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-warning">Pending</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                  <tr>
                    <td>832</td>
                    <td>Michael Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-primary">Approved</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Expandable Table</h3>
            </div>
            <!-- ./card-header -->
            <div class="card-body">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Reason</th>
                  </tr>
                </thead>
                <tbody>
                  <tr data-widget="expandable-table" aria-expanded="false">
                    <td>183</td>
                    <td>John Doe</td>
                    <td>11-7-2014</td>
                    <td>Approved</td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                  <tr class="expandable-body">
                    <td colspan="5">
                      <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                      </p>
                    </td>
                  </tr>
                  <tr data-widget="expandable-table" aria-expanded="true">
                    <td>219</td>
                    <td>Alexander Pierce</td>
                    <td>11-7-2014</td>
                    <td>Pending</td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                  <tr class="expandable-body">
                    <td colspan="5">
                      <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                      </p>
                    </td>
                  </tr>
                  <tr data-widget="expandable-table" aria-expanded="true">
                    <td>657</td>
                    <td>Alexander Pierce</td>
                    <td>11-7-2014</td>
                    <td>Approved</td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                  <tr class="expandable-body">
                    <td colspan="5">
                      <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                      </p>
                    </td>
                  </tr>
                  <tr data-widget="expandable-table" aria-expanded="false">
                    <td>175</td>
                    <td>Mike Doe</td>
                    <td>11-7-2014</td>
                    <td>Denied</td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                  <tr class="expandable-body">
                    <td colspan="5">
                      <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                      </p>
                    </td>
                  </tr>
                  <tr data-widget="expandable-table" aria-expanded="false">
                    <td>134</td>
                    <td>Jim Doe</td>
                    <td>11-7-2014</td>
                    <td>Approved</td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                  <tr class="expandable-body">
                    <td colspan="5">
                      <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                      </p>
                    </td>
                  </tr>
                  <tr data-widget="expandable-table" aria-expanded="false">
                    <td>494</td>
                    <td>Victoria Doe</td>
                    <td>11-7-2014</td>
                    <td>Pending</td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                  <tr class="expandable-body">
                    <td colspan="5">
                      <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                      </p>
                    </td>
                  </tr>
                  <tr data-widget="expandable-table" aria-expanded="false">
                    <td>832</td>
                    <td>Michael Doe</td>
                    <td>11-7-2014</td>
                    <td>Approved</td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                  <tr class="expandable-body">
                    <td colspan="5">
                      <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                      </p>
                    </td>
                  </tr>
                  <tr data-widget="expandable-table" aria-expanded="false">
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td>Denied</td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  </tr>
                  <tr class="expandable-body">
                    <td colspan="5">
                      <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                      </p>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Expandable Table Tree</h3>
            </div>
            <!-- ./card-header -->
            <div class="card-body p-0">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td class="border-0">183</td>
                  </tr>
                  <tr data-widget="expandable-table" aria-expanded="true">
                    <td>
                      <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                      219
                    </td>
                  </tr>
                  <tr class="expandable-body">
                    <td>
                      <div class="p-0">
                        <table class="table table-hover">
                          <tbody>
                            <tr data-widget="expandable-table" aria-expanded="false">
                              <td>
                                <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                219-1
                              </td>
                            </tr>
                            <tr class="expandable-body">
                              <td>
                                <div class="p-0">
                                  <table class="table table-hover">
                                    <tbody>
                                      <tr>
                                        <td>219-1-1</td>
                                      </tr>
                                      <tr>
                                        <td>219-1-2</td>
                                      </tr>
                                      <tr>
                                        <td>219-1-3</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </td>
                            </tr>
                            <tr data-widget="expandable-table" aria-expanded="false">
                              <td>
                                <button type="button" class="btn btn-primary p-0">
                                  <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                </button>
                                219-2
                              </td>
                            </tr>
                            <tr class="expandable-body">
                              <td>
                                <div class="p-0">
                                  <table class="table table-hover">
                                    <tbody>
                                      <tr>
                                        <td>219-2-1</td>
                                      </tr>
                                      <tr>
                                        <td>219-2-2</td>
                                      </tr>
                                      <tr>
                                        <td>219-2-3</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td>219-3</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>657</td>
                  </tr>
                  <tr>
                    <td>175</td>
                  </tr>
                  <tr>
                    <td>134</td>
                  </tr>
                  <tr>
                    <td>494</td>
                  </tr>
                  <tr>
                    <td>832</td>
                  </tr>
                  <tr>
                    <td>982</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div> --}}
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
</div>

  @endsection

  @section('script')
  

  
  @endsection