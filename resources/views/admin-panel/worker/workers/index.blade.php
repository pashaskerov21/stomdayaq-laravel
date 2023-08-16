@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Workers</h4>
            </div>
        </div>
    </div>
    <div class="row">
        @if (session('success'))
            <div class="col-12">
                <div class="alert alert-success alert-dismissible text-bg-success border-0 fade show" role="alert">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="{{ route('admin.worker.create') }}" class="btn btn-danger mb-2"><i
                                    class="mdi mdi-plus-circle me-2"></i> Add Worker</a>
                        </div>
                    </div>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-12">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th style="width: 100px">#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th style="width: 150px">Action</th>
                        <th style="width: 100px"></th>
                    </tr>
                </thead>
                <tbody id="workers-tbody">
                    @foreach ($workers as $worker)
                        <tr id="sort_{{ $worker->id }}">
                            <td>{{ $loop->index + 1 }}</td>
                            <td>
                                <div class="image-td">
                                    <img src="{{ asset('uploads/worker/' . $worker->image) }}" alt="">
                                </div>
                            </td>
                            <td>{{ $worker->getName->first()->name }}</td>
                            <td>{{ $worker->category->getName->first()->name }}</td>
                            <td>
                                <div class="table-action">
                                    <a href="{{ route('admin.worker.edit', $worker->id) }}" class="action-icon me-1"> <i
                                            class="mdi mdi-square-edit-outline"></i></a>
                                    <form action="{{ route('admin.worker.destroy', $worker->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn action-icon"><i class="mdi mdi-delete"></i></button>
                                    </form>
                                </div>
                            </td>
                            <td>
                                <button class="btn action-icon handle"><i class="ri-drag-move-2-line"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script>
            $('#workers-tbody').sortable({
                handle: 'button.handle',
                cancel: '',
                update: function() {
                    let siralama = $('#workers-tbody').sortable('serialize');
                    $.get("{{ route('admin.worker.sort') }}?" + siralama, function(response) {});
                }
            });
        </script>
    @endpush
@endsection
