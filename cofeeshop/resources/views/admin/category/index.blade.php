<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b >All Categories</b>
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                <div><a href="" class="btn btn-primary mb-3">Add Category</a></div>
                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        
                        <div class="card-header">
                            All Category
                        </div>
                        
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">SL No</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">User</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $categories->firstItem() + $loop->index }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->user->name }}</td>
                                <td>
                                    @if($category->created_at==NULL)
                                        <span class="text-danger">No fucking date</span>
                                    @else
                                        {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('dashboard/admin/category/edit/'.$category->id)}}" class="btn btn-sm btn-success">Edit</a>
                                    <form action="{{ route('delete.category', $category->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" style="background:red" type="submit">delete</button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
            
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Add Category
                </div>
                <div class="card-body">
                    <form action="{{ route('store.category') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail">Category Name</label>
                            <input name="name" type="text" class="form-control" id=""/>
                            @error('name')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary ">Add Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
</x-app-layout>
