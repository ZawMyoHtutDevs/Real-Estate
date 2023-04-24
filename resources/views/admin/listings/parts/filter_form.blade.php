<!-- Modal -->
<div class="modal modal-right fade " id="filter">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="side-modal-wrapper">
                <form action="{{route('admin.listings.index')}}" method="get">
                    
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Filter</h5>
                    
                </div>

                <div class="modal-body">
                    
                        <div class="form-group">
                          <label for="">Search With Name</label>
                          <input type="text"
                            class="form-control" name="name" id="name" value="{{request()->get('name','')}}" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Search With Type</label>
                            <select name="type_id" id="" class="select2">
                                <option value="">Select Type</option>
                                @foreach ($types as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Search With Category</label>
                            <select name="category_id" id="" class="select2">
                                <option value="">Select Category</option>
                                @foreach ($categories as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Search With City</label>
                            <select name="city_id" id="" class="select2">
                                <option value="">Select City</option>
                                @foreach ($cities as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        
                        
                        <div class="form-group">
                            <label for="">Search With Status</label>
                            <select name="status" id="" class="form-control">
                                @if (request()->get('status') == '0')
                                <option value="0">Inactive</option>
                                @else
                                <option value="1">Active</option>
                                @endif
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                                
                            </select>
                        </div>

                        
                    
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-default mr-3" href="{{route('admin.listings.index')}}">Reset</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
            </div>
        </div>
    </div>
</div>