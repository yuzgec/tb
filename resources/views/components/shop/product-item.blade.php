<div class="product product-4 text-center">

    <span class="product-label label-new"><i class="icon-calendar"></i> {{ $item->year }}</span>
    <span class="product-label label-top">{{ $item->getLanguage->title }}</span>


    <figure class="product-media">
        <a href="{{ route('urun' , $item->slug)}}" title="{{ $item->title }}">
            <img class="img-fluid"
                 src="{{ (!$item->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $item->getFirstMediaUrl('page', 'thumb') }}"
                 alt="{{ $item->title }}"
            width="400px" height="400px">
            @foreach($item->getMedia('gallery')->take(1) as $img)
                {{ $img->img('thumb')->attributes(['class' => 'product-image-hover', 'alt' => $item->title]) }}
            @endforeach
        </a>
        <div class="product-action-vertical">
            <form method="post" action="{{ route('favoriekle')}}">
                @csrf
             <input type="hidden" name="id" value="{{ $item->id }}" />
            <button type="submit"  class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></button>
            </form>
        </div>
    </figure>

    <div class="product-body">

        <div class="product-cat text-center text-light mb-0 birsatir">
            @foreach($item->getCategory->take(1) as $category)
                @php $name = \App\Models\ProductCategory::select('id','title', 'slug')->find($category->category_id) @endphp
                <a href="{{ route('kategori', [$name->slug, 'id' => $name->id]) }}">{{ $name->title }}</a>
            @endforeach
        </div>

        <h3 class="product-title birsatir">
            <a href="{{ route('urun' , $item->slug)}}" title="{{ $item->title }}">
            {{ $item->title }}
        </h3>
        <div class="product-price">
            {{ money($item->price) }}₺
        </div>


        <div class="ratings-container">
            <div class="ratings">
                <div class="ratings-val" style="width: {{ condition($item->condition) }}%"
                     title="{{ conditionText($item->condition) }}"></div>
            </div>
            <span class="ratings-text">( {{ conditionText($item->condition) }} )</span>
        </div>
    </div>



    <div class="product-action">
        <a href="{{ route('urun' , $item->slug)}}"
           title="{{ $item->title }}"
           class="btn-product btn-cart">
            <span>İncele</span>
        </a>
    </div>
</div>
