<x-app-layout>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Edit Product
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="{{ route('update.product',$products->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="old_image" value="{{$products->image}}"/>
                            <div class="form-group">
                                <label for="exampleInputEmail"> Name</label>
                                <input value="{{$products->product}}" name="product" type="text" class="form-control" id=""/>
                                @error('name')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail">Category Name</label>
                                <select value="{{$products->category_id}}" name="category_id">
                                    @foreach( $categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail">description</label>
                                <textarea class="form-control" name="description">
                                    {{$products->description}}
                                </textarea>
                                @error('description')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail">price</label>
                                <input value="{{$products->price}}" name="price" type="number" class="form-control" id=""/>
                                @error('price')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail">Photo</label>
                                <input name="image" type="file" class="form-control" id=""/>
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
</x-app-layout>