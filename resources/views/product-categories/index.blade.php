<x-layout>
  <x-slot:breadcrumb>
    <ul>
      <li>Home</li>
      <li>Product Categories</li>
    </ul>
  </x-slot:breadcrumb>

  <x-section class='space-y-4'>
    <div class='flex items-center justify-between'>
      <h4 class='text-xl font-bold tracking-tight'>List of all Product Categories</h4>
      <a href={{ route('product-categories.create') }}>
        <x-icon-s-plus class='h-6 w-6' />
      </a>
    </div>
    <div class="overflow-x-auto">
      <table class="table">
        <thead>
          <tr>
            <th></th>
            <th>Name</th>
            <th>Code</th>
            <th>Parent</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($product_categories as $product_category)
            <tr>
              <td>{{ $product_category->id }}</td>
              <td>{{ $product_category->name }}</td>
              <td>
                <div class="badge badge-neutral text-xs uppercase">{{ $product_category->code }}<div>
              </td>
              <td>{{ $product_category->parent_id }}</td>
              <td class='space-x-2'>
                <x-button href="{{ route('product-categories.show', $product_category) }}">
                  {{ __('view') }}
                </x-button>
                <x-button href="{{ route('product-categories.edit', $product_category) }}">
                  {{ __('edit') }}
                </x-button>
                <x-button onclick="event.preventDefault(); del_product_{{ $product_category->id }}.showModal();">
                  {{ __('delete') }}
                </x-button>
                <dialog class="modal" id="del_product_{{ $product_category->id }}">
                  <form action="{{ route('product-categories.destroy', $product_category) }}" class="modal-box"
                    method="POST">
                    @csrf
                    @method('delete')
                    <h3 class="text-lg font-bold">Delete Product Category</h3>
                    <p class="py-4">Are you sure you want to delete category,
                      <strong>{{ $product_category->name }}</strong>?
                    </p>
                    <div class="modal-action flex space-x-2">
                      <button
                        class="btn w-32 flex-auto bg-gray-600 text-white transition-colors duration-150 ease-in-out hover:bg-gray-500"
                        onclick="event.preventDefault(); del_product_{{ $product_category->id }}.close();"
                        type='button'>Cancel</button>
                      <button autofocus
                        class="btn w-64 flex-auto bg-violet-600 text-white transition-colors duration-150 ease-in-out hover:bg-violet-500"
                        type='submit'>Confirm</button>
                    </div>
                  </form>
                </dialog>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      @empty($product_categories->all())
        <div class="pt-6 text-center text-sm font-medium">no product categories found...</div>
      @endempty
    </div>
  </x-section>
</x-layout>
