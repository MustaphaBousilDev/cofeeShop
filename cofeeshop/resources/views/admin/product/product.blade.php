<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b >All products</b>
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="containers px-5">
            <div class="row">
                <div class="col-md-12">
                <div><a href="{{route('product.add')}}" class="btn btn-primary mb-3">Add Products</a></div>
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
                            All products
                        </div>
                        
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">img product</th>
                        <th scope="col">Name</th>
                        <th scope="col">categories</th>
                        <th scope="col">description</th>
                        <th scope="col">price</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td><img src="{{asset('uploads/'.$product->image)}}" width="50px" height="50px"/></td>
                                <td>{{$product->product}}</td>
                                <td>{{$product->category_id}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->created_at}}</td>
                                <td class="d-flex">
                                    <a href="{{route('edit.product',$product->id)}}" class="btn btn-sm btn-success">Edit</a>
                                    <form action="{{route('delete.product',$product->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" style="background:red" type="submit">delete</button>
                                    </form>
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
</x-app-layout>