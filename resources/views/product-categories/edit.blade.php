<x-layout>
  <x-slot:breadcrumb>
    <ul>
      <li><a href={{ route('product-categories.index') }}>Home</a></li>
      <li><a href={{ route('product-categories.index') }}>Product Categories</a></li>
      <li><a href={{ route('product-categories.show', $product_category) }}>{{ $product_category->id }}</a></li>
      <li>Edit</li>
    </ul>
  </x-slot:breadcrumb>

  <x-section class="space-y-8">
    <div class='flex items-center space-x-2'>
      <x-heroicon-o-document-text class='h-12 w-12' />
      <h2 class='text-4xl font-bold tracking-tight'>Edit Category</h2>
    </div>

    <form action={{ route('product-categories.update', $product_category) }}
      class="form-control w-full max-w-lg space-y-6" method="POST">
      @csrf
      @method('PATCH')
      <div>
        <label class="label" for="name">
          <span class="label-text cursor-pointer">Name of category</span>
        </label>
        <input class="input input-bordered input-md w-full" id='name' name='name' placeholder="Category Name"
          type="text" value={{ $product_category->name }} />
      </div>

      <div>
        <label class="label" for="code">
          <span class="label-text cursor-pointer">Category identifier code</span>
        </label>
        <input class="input input-bordered input-md w-full" id='code' name='code' placeholder="Category Code"
          type="text" value={{ $product_category->code }} />
      </div>

      <div>
        <label class="label" for="parent">
          <span class="label-text cursor-pointer">Choose parent category</span>
        </label>
        <select class="select select-bordered select-md w-full" id='parent_id' name='parent_id'>
          <option disabled selected>
            Choose parent category
          </option>
          @foreach (\App\Models\ProductCategory::all() as $parent_category)
            <option @selected($parent_category->id === $product_category->parent_id) value={{ $parent_category->id }}>{{ $parent_category->name }}</option>
          @endforeach
        </select>
      </div>

      <div class='flex'>
        <button
          class='btn mt-6 flex-1 bg-violet-600 text-white transition-colors duration-150 ease-in-out hover:bg-violet-500'
          type="submit">
          Update category
        </button>
      </div>
    </form>
  </x-section>
</x-layout>
