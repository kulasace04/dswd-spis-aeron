<div>

<div class="flex items-center ">
    <div class="flex space-x-3 items-center">
    <div class="w-96 relative z-10">
        <div class="absolute left-3 top-4">
            <svg class="text-gray-300 block h-5 w-5 fill-current" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                width="512px" height="512px">
                <path
                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
            </svg>
        </div>
        <input class="border-2 border-gray-300 bg-white pl-10 h-10 w-full my-2 rounded-lg text-sm focus:outline-none" type="search" placeholder="Search..." wire:model="search" />
    </div>

    <x-filter sort="{{ $gender }}" option="gender" label="Gender" />
    <x-filter sort="{{ $status }}" option="status" label="Marital Status" />
    
    </div>
    <a href="{{ route('report.export') }}" class=" inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-auto">Export Report</a>
</div>


    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-900 text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">SPID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">SENIOR CITIZEN ID NO./OSCA NO.</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">LAST NAME</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">FIRST NAME</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">MIDDLE NAME</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">SEX</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">MARITAL STATUS</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">PROVINCE</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">MUNICIPALITY</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">BARANGAY</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">BIRHTDATE/PLACE </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">-</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($pensions as $pension)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $pension->spid ?? 'N/A'}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $pension->senior_citizen_id ?? 'N/A'}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $pension->last_name ?? 'N/A'}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $pension->first_name ?? 'N/A'}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $pension->middle_name ?? 'N/A'}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $pension->sex ?? 'N/A'}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $pension->marital_status ?? 'N/A'}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <p>{{ $pension->province_value ?? ''}}</p>
                                    <p class="text-xs">{{ $pension->province ?? 'N/A'}}</p>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <p>{{ $pension->municipality_value ?? ''}}</p>
                                    <p class="text-xs">{{ $pension->municipality ?? 'N/A'}}</p>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <p>{{ $pension->barangay_value ?? 'N/A'}}</p>
                                    <p class="text-xs">{{ $pension->barangay ?? 'N/A'}}</p>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <p>{{ $pension->birthdate ?? 'N/A'}}</p>
                                    <p>{{ $pension->birthplace ?? 'N/A'}}</p>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <a href="{{ route('pension.show', ['pension' => $pension->id ]) }}">Show</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="my-4">
        {{ $pensions->links('components.paginate') }}
    </div>

</div>
