<div class="w-full">
    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-4">
                    <x-input.text name="first_name" label="First Name" />
                </div>
                <div class="col-span-4">
                    <x-input.text name="middle_name" label="Middle Name" />
                </div>
                <div class="col-span-4">
                    <x-input.text name="last_name" label="Last Name" />
                </div>

                <div class="col-span-6">
                    <x-input.select name="sex" label="Sex" option="gender" />
                </div>

                <div class="col-span-6">
                    <x-input.select name="marital_status" label="Marital Status" option="maritalStatus" />
                </div>

                <div class="col-span-6">
                    <x-input.date name="birthdate" label="Birthdate" />
                </div>

                <div class="col-span-6">
                    <x-input.text name="birthplace" label="Birthplace" />
                </div>

                <div class="col-span-12">
                    <x-input.text name="senior_citizen_id" label="Senior Citizen Id" />
                </div>

                <div class="col-span-4">
                    <x-input.select name="province" label="Province" option="province" />
                </div>
                <div class="col-span-4">
                    <x-input.select name="municipality" label="Municipality" option="municipality" attribute="{{ $province }}" />
                </div>
                <div class="col-span-4">
                    <x-input.select name="barangay" label="Barangay" option="barangay" attribute="{{ $municipality }}" />
                </div>

            </div>

        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 flex">
            @if(session()->has('success'))
            <div class="text-white text-sm my-auto px-4 py-2 font-medium bg-green-400 rounded-md">{{ session('success') }}</div>
            @endif
            <button type="button" wire:click="save" class="ml-auto inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Save</button>
        </div>
    </div>
</div>
