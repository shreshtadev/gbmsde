<div class="min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-lg">
      <h1 class="text-2xl font-semibold text-center text-gray-500 mt-8 mb-6">Family Detail Filters</h1>
      <form wire:submit="exportCsv">
        <div class="mb-4">
          <label for="nombre" class="block mb-2 text-sm text-gray-600">ವೇದ</label>
          <select wire:model="familyFilterDetailForm.veda" type="text" id="veda" name="nombre" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
            <option value = "rig">ಋಗ್ವೇದ</option>
            <option value = "yajur">ಯಜುರ್ವೇದ</option>
            <option value = "sama">ಸಾಮವೇದ</option>
          </select>

        </div>
        <div class="mb-4">
          <label for="apellido" class="block mb-2 text-sm text-gray-600">ಪಂಗಡ</label>
          <select wire:model="familyFilterDetailForm.category" type="text" id="category" name="category" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
            <option value = "advaita">ಅದ್ವೈತ</option>
            <option value = "dwaita">ದ್ವೈತ</option>
            <option value = "vishisthadwaita">ವಿಶಿಷ್ಟಾದ್ವೈತ</option>
          </select>
        </div>
        <div class="mb-4">
          <label for="email" class="block mb-2 text-sm text-gray-600">ಉಪಪಂಗಡ</label>
          <input wire:model="familyFilterDetailForm.subCategory" type="text" id="subCategory" name="subCategory" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
        </div>
        <div class="mb-4">
          <label for="password" class="block mb-2 text-sm text-gray-600">ತಾಲೂಕು</label>
          <input wire:model="familyFilterDetailForm.taluk" type="text" id="taluk" name="taluk" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
        </div>
        <div class="mb-6">
          <label for="confirmPassword" class="block mb-2 text-sm text-gray-600">ಪ್ರದೇಶ</label>
          <input wire:model="familyFilterDetailForm.area" type="text" id="area" name="area" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
        </div>
        <button type="submit" class="w-32 bg-gradient-to-r from-cyan-400 to-cyan-600 text-white py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mb-2">Generate Details</button>
      </form>
      <div class="text-center">
        <p class="text-sm">For more details <a href="#" class="text-cyan-600">Admin Hub</a></p>
      </div>
      <p class="text-xs text-gray-600 text-center mt-8">&copy; {{date('Y')}} Shreshta SMG</p>
    </div>
  </div>
