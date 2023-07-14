<x-layout>
  <x-slot:breadcrumb>
    <ul>
      <li>Home</li>
      <li>Categories</li>
    </ul>
  </x-slot:breadcrumb>

  <x-section>
    <div class='flex items-center justify-between'>
      <h4 class='text-xl font-bold tracking-tight'>List of all Categories</h4>
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
            <form action="{{ route('product-categories.destroy', $product_category) }}"
              class="absolute -m-1 h-1 w-1 overflow-hidden whitespace-nowrap border-none p-0" id="del_product"
              method="POST">
              @csrf
              @method('delete')
            </form>
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
                <button class="btn btn-ghost btn-xs hover:bg-transparent hover:underline" form="del_product"
                  type="submit">
                  {{ __('delete') }}
                </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </x-section>
</x-layout>
