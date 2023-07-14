<x-layout>
  <x-slot:breadcrumb>
    <ul>
      <li><a href={{ route('product-categories.index') }}>Home</a></li>
      <li><a href={{ route('product-categories.index') }}>Categories</a></li>
      <li>{{ $product_category->id }}</li>
    </ul>
  </x-slot:breadcrumb>

  <x-section class='space-y-8'>
    <div class='flex items-center space-x-6'>
      <h1 class='text-6xl font-bold tracking-tight'>{{ $product_category->name }}</h1>
      <p class='badge rounded-lg bg-violet-700 py-4 px-4 text-xs text-white'>{{ $product_category->code }}</p>
    </div>
    <p class='max-w-lg text-sm text-gray-800'>
      Et quo unde explicabo reiciendis natus exercitationem dolores perferendis consequuntur soluta omnis voluptatibus
      dicta, quisquam voluptate itaque eos obcaecati, nihil architecto autem! Vi, sit amet consectetur
      adipisicing elit. Cupiditate maxime fugiat nisi alias animi esse eum laboriosam.
    </p>
  </x-section>
</x-layout>
