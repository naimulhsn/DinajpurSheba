@extends('layouts.app')

@section('content')
<div class="container pt-4">
    <div class="row justify-content-center">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('status') }}
            </div>
        @endif
        @if (session('bad_status'))
            <div class="alert alert-danger" role="alert">
                {{ session('bad_status') }}
            </div>
        @endif
          
        {{-- Update Info --}}
        {{-- Update Info --}}
        {{-- Update Info --}}
        {{-- Update Info --}}
        @if( $user->id == Auth::user()->id && ( $user->seller->image==null || $user->seller->nid==null ) )
        <div class="col-md-12 mb-4">
            <div class="card" id="add-info">
                <div class="card-header bg-primary text-white ">{{ __(' আরো তথ্য সংযুক্ত করুন ') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update',$user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                         {{-- Upload Image --}}
                         @if($user->seller->image==null )
                         <div class="form-group row">
                            <img class="mb-2" style="max-height:150px; object-fit:contain" id='img-upload'/>
                            <label for="image" class="col-md-3 col-form-label text-md-right"> আপনার ছবি আপলোড করুন</label>
                            <div class="col-md-7">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="btn btn-outline-primary btn-file" id="imgUpload">
                                            Browse… <input type="file" name="image" id="imgInp" >
                                        </span>
                                        
                                    </span>
                                    <input type="text" class="form-control" readonly aria-describedby="imgUpload" >
                                </div>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endif
                        @if($user->seller->nid==null )
                        <div class="form-group row">
                            <label for="nid" class="col-md-3 col-form-label text-md-right">{{ __(' জাতীয় পরিচয় পত্রের নাম্বার ') }}</label>

                            <div class="col-md-7">
                                <input id="nid" type="number" class="form-control @error('nid') is-invalid @enderror" name="nid"
                                 value="{{ old('nid') }}" autocomplete="nid">

                                @error('nid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endif
                        
                        {{-- Upload button --}}
                        <div class="form-group row mt-4 mb-2">
                            <div class="col-md-7 offset-md-3">
                                <button type="submit" class="btn btn-outline-primary btn-block">
                                    {{ __(' কার্যকর করুন') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    {{-- Error alart --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @endif




        {{-- Profile info starts here --}}
        {{-- Profile info starts here --}}
        {{-- Profile info starts here --}}
        {{-- Profile info starts here --}}
        {{-- Profile info starts here --}}
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title mb-4">
                        <div class="d-flex justify-content-start">
                            <div class="image-container">
                                @if($user->seller->image==null)
                                <img src="/images/web/farmer.png" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                @else
                                <img src={{$user->seller->image}} id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                @endif
                                <!--div class="middle">
                                    <input type="button" class="btn btn-secondary" id="btnChangePicture" value="Change" />
                                    <input type="file" style="display: none;" id="profilePicture" name="file" />
                                </div-->
                            </div>
                            <div class="userData ml-3">
                                <h2 class="d-block" style="font-size: 1.3rem; font-weight: bold">{{$user->name}}</h2>
                                @if ($user->id !== Auth::user()->id)
                                    <h6 class="d-block">(মোবাইলে যোগাযোগ করুন)</h6>
                                @endif
                                
                            </div>
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" 
                                    role="tab" aria-controls="basicInfo" aria-selected="true"> 
                                    @if($user->id == Auth::user()->id ) আমার তথ্য
                                    @else
                                    বিক্রেতার তথ্য 
                                    @endif
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content ml-1" id="myTabContent">
                                <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                    

                                    <div class="row">
                                        <div class="col-md-3">
                                            <label style="font-weight:bold;"> নাম </label>
                                        </div>
                                        <div class="col-md-7">
                                            <span class="myFont">{{$user->name}}</span> 
                                        </div>
                                    </div>
                                    
                                    <hr />
                                    
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label style="font-weight:bold;"> ঠিকানা </label>
                                        </div>
                                        <div class="col-md-7">
                                            <span class="myFont">{{$user->seller->address}} </span> 
                                        </div>
                                    </div>
                                    <hr />
                                    @if($user->id == Auth::user()->id )

                                    <div class="row">
                                        <div class="col-md-3">
                                            <label style="font-weight:bold;"> জাতীয় পরিচয় পত্র নম্বর </label>
                                        </div>
                                        <div class="col-md-7">
                                            <span class="myFont">{{$user->seller->nid}} </span> 
                                        </div>
                                    </div>
                                    <hr />

                                    @endif

                                    <div class="row">
                                        <div class="col-md-3">
                                            <label style="font-weight:bold;">Verified</label>
                                        </div>
                                        <div class="col-md-7">
                                            <span class="myFont">{{$user->seller->verified}} </span> 
                                        </div>
                                    </div>
                                    
                                    <hr />
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label style="font-weight:bold;"> মোবাইল নাম্বার </label>
                                        </div>
                                        <div class="col-md-7">
                                            <span class="myFont" id="phoneNumber">{{$user->phone}} </span> 
                                        </div>
                                        @if($user->id!== Auth::user()->id )
                                        <div class="col-md-2">

                                            <div class="mytooltip">
                                                <a href="tel:+88{{$user->phone}}" class="btn btn-success" role="button" aria-pressed="true">
                                                    <i class="fa fa-phone"></i>
                                                    <span class="mytooltiptext" id="myTooltipcall"> সরাসরি কল করুন </span>
                                                </a>
                                            </div>

                                            <div class="mytooltip copytip"> 
                                                <button class="btn btn-primary" onclick="myFunctionCopy()" onmouseout="outFuncCopy()">
                                                    <i class="fa fa-copy"></i>
                                                    <span class="mytooltiptext" id="myTooltip">নাম্বারটি কপি করুন</span>
                                                </button>
                                            </div>
                                            <script>
                                                function myFunctionCopy() {
                                                    var copyText = document.getElementById("phoneNumber");
                                                    var textArea = document.createElement("textarea");
                                                    textArea.value = copyText.textContent;
                                                    document.body.appendChild(textArea);
                                                    textArea.select();
                                                    document.execCommand("Copy");
                                                    
                                                    var tooltip = document.getElementById("myTooltip");
                                                    tooltip.innerHTML = "Copied : " + textArea.value;
                                                    textArea.remove();
                                                }
                                                
                                                function outFuncCopy() {
                                                    var tooltip = document.getElementById("myTooltip");
                                                    tooltip.innerHTML = "নাম্বারটি কপি করুন";
                                                }
                                            </script>
                                        </div>
                                        @endif
                                    </div>
                                    

                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>


        
        

       
        <div class="col-md-12 mt-4">
            <div class="card mb-4">
                <h5 class="m-2 pt-2"> এই বিক্রেতার সকল পণ্য </h5>
            </div>
            <div class="row">
                @foreach($products as $product) 

                    <div class="col-md-3">
                        <a href={{route('products.show', $product->id)}}>

                            <div class="custom_card card mb-4">
                                <img src="{{ $product->image->image_link }}" class="card-img-top mt-2"
                                 style="height:150px; object-fit:contain" alt="{{ $product->product_variety }}">
                                <div class="card-img-overlay">
                                    <span class="badge badge-success pt-2 pb-1" style="font-size:0.8rem">লিচু</span>
                                </div>

                                <div class="card-body">
                                    <p class="card-title text-dark" style="font-weight:bold; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 
                                    'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                                        {{ $product->product_variety }}
                                    </p>
                                    <div>
                                        <p class="d-inline text-dark"> মূল্য : </p> 
                                        <strong class="d-inline" style="color:seagreen">৳ {{ $product->price }} </strong> <span>(প্রতি হাজার)</span>
                                    </div>
                                    <span>
                                        <p class="d-inline text-dark text-small">স্টক : </p>
                                        <p class="d-inline text-dark text-small" > <strong>{{$product->stock}}</strong> হাজার</p>
                                    </span>
                                    
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            {{-- Paginationnnnnnnnnnn --}}
            <div style="">
                {!! $products->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection
