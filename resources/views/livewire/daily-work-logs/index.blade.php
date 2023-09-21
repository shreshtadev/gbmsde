<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Worklogs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form wire:submit="addWorkLog" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label for="uploadedFileType" class="block mb-2 text-sm text-gray-600">Uploaded File Type</label>
                            <select id="uploadedFileType" wire:model="dailyWorkLogForm.uploadedFileType" type="text"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
                                <option value="FamilyDetail">Family Detail</option>
                                <option value="FamilyMemberDetail">Family Member Detail</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="worklogAttachment" class="block mb-2 text-sm text-gray-600">Worklog Attachment</label>
                            <input id="worklogAttachment" type="file" wire:model="dailyWorkLogForm.worklogAttachment" />
                        </div>

                        <button type="submit" class="w-64  mx-auto block mb-2 items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
