@extends('admin.partials.master')
@section('admin_content')
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title">
                            <div class="d-flex justify-content-between">
                                <div>Task Lists</div>
                                <div><a href="{{route('admin.task.create')}}" class="btn btn-primary btn-sm"> <i class="bx bx-plus"></i> Add New Item </a> </div>
                            </div>
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped dataex-html5-selectors">
                                    <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Team Invest</th>
                                        <th>Bonus</th>
                                        <th>Team size</th>
                                        <th>Active</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tasks as $key => $row)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{price($row->invest)}}</td>
                                            <td>{{price($row->bonus)}}</td>
                                            <td>{{$row->team_size}}</td>
                                            <td>
                                                <a href="{{route('admin.task.create', $row->id)}}"
                                                   class="btn btn-warning" style="padding: 3px 7px;font-size: 20px" data-toggle="tooltip" title='Edit'>
                                                    <i class="bx bx-pencil"></i></a>
                                                <form method="POST" action="{{route('admin.task.delete', $row->id)}}"
                                                      class="d-inline">@csrf
                                                    {{method_field('DELETE')}}
                                                    <button type="submit"
                                                            style="padding: 3px 7px;"
                                                            class="btn btn-icon btn-danger delete_confirm{{$row->id}}"
                                                            data-toggle="tooltip" title='Delete'>
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                    @include('admin.partials.delete-confirmation')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

