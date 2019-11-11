<div class="column-block">
  <div class="columnblock-title">Categories</div>
  <div class="category_block">
    <ul class="box-category treeview-list treeview">

      @foreach ($categories as $category)
        <li><a href="{{ $category->slug }}">{{ $category->name }}</a></li>
      @endforeach
      
    </ul>
  </div>
</div>