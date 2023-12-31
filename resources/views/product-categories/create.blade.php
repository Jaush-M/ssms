<x-layout>
  <x-slot:breadcrumb>
    <ul>
      <li><a href={{ route('product-categories.index') }}>Home</a></li>
      <li><a href={{ route('product-categories.index') }}>Product Categories</a></li>
      <li>Create</li>
    </ul>
  </x-slot:breadcrumb>

  <x-section class="space-y-8">
    <div class='flex items-center space-x-2'>
      <x-heroicon-o-document-text class='h-12 w-12' />
      <h2 class='text-4xl font-bold tracking-tight'>Create Category</h2>
    </div>

    <form action={{ route('product-categories.store') }} class="form-control w-full max-w-lg space-y-6" method="POST">
      @csrf
      <div>
        <label class="label" for="name">
          <span class="label-text cursor-pointer">Name of category</span>
        </label>
        <input class="input input-bordered input-md w-full" id='name' name='name' placeholder="Category Name"
          type="text" value="{{ old('name') }}" />
        <x-input-error :errors="$errors->get('name')" class="mt-2" />
      </div>

      <div>
        <label class="label" for="code">
          <span class="label-text cursor-pointer">Category identifier code</span>
        </label>
        <input class="input input-bordered input-md w-full" id='code' name='code' placeholder="Category Code"
          type="text" value="{{ old('code') }}" />
        <x-input-error :errors="$errors->get('code')" class="mt-2" />
      </div>

      <div>
        <label class="label" for="parent">
          <span class="label-text cursor-pointer">Choose parent category</span>
        </label>
        <select class="select select-bordered select-md w-full" id='parent_id' name='parent_id'>
          <option disabled selected>Choose parent category</option>
          @foreach ($product_categories as $product_category)
            <option value={{ $product_category->id }}>{{ $product_category->name }}</option>
          @endforeach
        </select>
        <x-input-error :errors="$errors->get('parent_id')" class="mt-2" />
      </div>

      <div class='flex'>
        <button
          class='btn mt-6 flex-1 bg-violet-600 text-white transition-colors duration-150 ease-in-out hover:bg-violet-500'
          type="submit">
          Create new category
        </button>
      </div>
    </form>
  </x-section>
</x-layout>
