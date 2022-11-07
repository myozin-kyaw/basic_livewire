<div class="px-4 my-10 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Users</h1>
        <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name, title, email and role.</p>
      </div>
      <div>
        <label for="per_record" class="block text-sm font-medium text-gray-700">Per Record</label>
        <select id="per_record" wire:model="per_record" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
          <option value="5">5</option>
          <option value="10">10</option>
          <option value="25">25</option>
          <option value="all">All</option>
        </select>
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <input type="text" wire:model.debounce.300ms="search" id="search" class="border-sky-600 border-2 mx-3 px-3 py-1" placeholder="Search here ...">
        <input type="checkbox" wire:model="is_active" class="" id="is_active"> <span class="mx-3"> Is Active ?</span>
        <button type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add user</button>
      </div>
    </div>
    <div class="mt-8 flex flex-col">
      <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div class="relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <!-- Selected row actions, only show when rows are selected. -->
            <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">
              <button type="button" class="inline-flex items-center rounded border border-gray-300 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-30">Bulk edit</button>
              <button type="button" class="inline-flex items-center rounded border border-gray-300 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-30">Delete all</button>
            </div>

            <table class="min-w-full table-fixed divide-y divide-gray-300">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="relative w-12 px-6 sm:w-16 sm:px-8">
                    <input type="checkbox" class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                  </th>
                  <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">Id</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Name</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Is Active</th>
                  <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white">
                <!-- Selected: "bg-gray-50" -->
                @forelse ($users as $user)
                    <tr>
                        <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                        <!-- Selected row marker, only show when row is selected. -->
                        <div class="absolute inset-y-0 left-0 w-0.5 bg-indigo-600"></div>

                        <input type="checkbox" class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                        </td>
                            <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
                            <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">{{ $user->id }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->name }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->email }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                @if ($user->is_active)
                                    <span class="text-green-600 rounded-xl bg-green-200 px-4 py-1">Active</span>
                                @else
                                    <span class="text-red-600 rounded-xl bg-red-200 px-4 py-1">In Active</span>
                                @endif
                            </td>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">No records</td>
                    </tr>
                @endforelse
              </tbody>
            </table>

            @if ($per_record != 'all')
                {{ $users->links() }}
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
