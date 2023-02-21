@extends('template.templateUser')
@section('favoritos')
<div class="container">
    <h1>PRODUCTOS FAVORITOS</h1>
    {{-- @foreach ($products as $product) --}}
    <div class="container p-4">
        <div class="col-md-3 mb-3">
            <div class="card">
                <img class="img-fluid" src="https://images.unsplash.com/photo-1517760444937-f6397edcbbcd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=42b2d9ae6feb9c4ff98b9133addfb698">
                <div class="card-body">
                    <h4 class="card-title">Special title treatment</h4>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>
    </div>
    {{-- @endforeach --}}
</div>
@endsection
