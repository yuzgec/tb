<div class="product product-3 text-center">
    <span class="product-label label-circle label-new">Yeni</span>
    <figure class="product-media">
        <a href="{{ route('urun' , $item->slug)}}" title="{{ $item->title }}">
            <img class="img-fluid" src="{{ (!$item->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $item->getFirstMediaUrl('page', 'thumb') }}" alt="{{ $item->title }}">
            @foreach($item->getMedia('gallery')->take(1) as $img)
                {{ $img->img('thumb')->attributes(['class' => 'product-image-hover', 'alt' => $item->title]) }}
            @endforeach
        </a>

        <div class="product-action-vertical">
            <a href="{{ route('favoriekle', ['id' => $item->id]) }}" class="btn-product-icon btn-wishlist"><span>Favorilere Ekle</span></a>
        </div>
    </figure>

    <div class="product-body">
        <h3 class="product-title birsatir">
            <a href="{{ route('urun' , $item->slug)}}" title="{{ $item->title }}">
            {{ $item->title }}
        </h3>
        <div class="product-price">
            {{ money($item->price) }}₺
        </div>
    </div>
    <div class="product-action">
        <a href="{{ route('urun' , $item->slug)}}"
           title="{{ $item->title }}"
           class="btn-product btn-cart">
            <span>Sepete Ekle</span>
        </a>
    </div>
</div>
