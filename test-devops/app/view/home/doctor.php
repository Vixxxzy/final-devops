<div class="flex justify-center mt-5">
  <div class="bg-white shadow-lg rounded-2xl p-6 relative w-full max-w-7xl">
    <!-- Tombol di pojok kanan atas -->
    <button id="openModalBtn"
      class="absolute top-4 right-4 bg-gradient-to-r from-indigo-500 to-purple-600 text-white py-2 px-4 rounded-lg hover:from-indigo-400 hover:to-purple-500 transition duration-300">
      + New Doctor
    </button>


    <nav class="flex" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
          <a href="<?= APP_PATH;?>/home/index"
            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
              viewBox="0 0 20 20">
              <path
                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
            </svg>
            Dashboard
          </a>
        </li>
        <li>
          <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 9 4-4-4-4" />
            </svg>
            <a href="<?= APP_PATH;?>/home/doctor"
              class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Doctor</a>
          </div>
        </li>
      </ol>
    </nav>

    <table class="min-w-full bg-white border border-slate-200 rounded-lg overflow-hidden mt-10">
      <thead>
        <tr class="bg-slate-100">
          <th class="py-3 px-4 text-left text-slate-600">NO</th>
          <th class="py-3 px-4 text-left text-slate-600">NAME</th>
          <th class="py-3 px-4 text-left text-slate-600">SCHEDULE</th>
          <th class="py-3 px-4 text-left text-slate-600">EMAIL</th>
          <th class="py-3 px-4 text-left text-slate-600">NUMBER</th>
          <th class="py-3 px-4 text-left text-slate-600">ACTION</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($data['doctors'])): ?>
          <?php $count = 1; ?>
          <?php foreach ($data['doctors'] as $doctor): ?>
            <tr class="border-b">
              <td class="py-3 px-4"><?= $count++ ?></td>
              <td class="py-3 px-4"><?= htmlspecialchars($doctor['doctor_name']) ?></td>
              <td class="py-3 px-4">
                <?= htmlspecialchars($doctor['doctor_schedule_from']) ?> -
                <?= htmlspecialchars($doctor['doctor_schedule_to']) ?>
              </td>
              <td class="py-3 px-4"><?= htmlspecialchars($doctor['doctor_email']) ?></td>
              <td class="py-3 px-4"><?= htmlspecialchars($doctor['doctor_number']) ?></td>
              <td class="text-center space-x-3">
                <button type="button"
                  class="btn btn-info openEditBtn text-indigo-600 hover:text-indigo-800 transition duration-300"
                  data-id="<?= $doctor['doctor_id'] ?>" data-name="<?= htmlspecialchars($doctor['doctor_name']) ?>"
                  data-email="<?= htmlspecialchars($doctor['doctor_email']) ?>"
                  data-number="<?= htmlspecialchars($doctor['doctor_number']) ?>"
                  data-from="<?= $doctor['doctor_schedule_from'] ?>" data-to="<?= $doctor['doctor_schedule_to'] ?>">
                  <i class="fas fa-edit"></i>
                </button>

                <a href="<?= APP_PATH; ?>/home/delete_doctor/<?= $doctor['doctor_id']; ?>"
                  class="btn btn-danger text-red-600 hover:text-red-800 transition duration-300">
                  <i class="fas fa-trash-alt"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="6" class="py-3 px-4 text-center text-slate-600">Tidak ada appointment ditemukan</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Modal -->
<div id="inputModal" class="fixed inset-0 bg-slate-950/50 flex justify-center items-center hidden z-50">
  <div class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-4xl transform transition-all duration-300 scale-100">
    <h2 class="text-3xl font-semibold text-slate-800 mb-8 text-center">Add / Edit Doctor</h2>
    <form action="<?= APP_PATH; ?>/home/new_doctor" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <div>
        <label for="doctor_name" class="block text-slate-700 font-semibold mb-2">Name</label>
        <input type="text" id="doctor_name" name="doctor_name" placeholder="Doctor's full name"
          class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500"
          required>
      </div>

      <div>
        <label for="doctor_email" class="block text-slate-700 font-semibold mb-2">Email</label>
        <input type="email" id="doctor_email" name="doctor_email" placeholder="doctor@example.com"
          class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500"
          required>
      </div>

      <div>
        <label for="doctor_number" class="block text-slate-700 font-semibold mb-2">Phone Number</label>
        <input type="number" id="doctor_number" name="doctor_number" placeholder="08123456789"
          class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500"
          required>
      </div>

      <div>
        <label class="block text-slate-700 font-semibold mb-2">Schedule</label>
        <div class="flex space-x-3">
          <input type="time" id="doctor_schedule_from" name="doctor_schedule_from"
            class="w-1/2 px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500"
            required>
          <input type="time" id="doctor_schedule_to" name="doctor_schedule_to"
            class="w-1/2 px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500"
            required>
        </div>
      </div>

      <div class="col-span-1 md:col-span-2 flex justify-end space-x-4 mt-6">
        <button type="button" id="closeModalBtn"
          class="px-5 py-3 bg-gray-400 text-white rounded-xl hover:bg-gray-500 transition">Cancel</button>
        <button type="submit"
          class="px-6 py-3 bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold rounded-xl hover:from-indigo-400 hover:to-purple-500 transition">Save</button>
      </div>
    </form>
  </div>
</div>


<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-slate-950/50 flex justify-center items-center hidden z-50">
  <div class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-4xl">
    <h2 class="text-3xl font-semibold text-slate-800 mb-8 text-center">Edit Doctor</h2>
    <form action="<?= APP_PATH; ?>/home/update_doctor" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <input type="hidden" id="edit_doctor_id" name="doctor_id">

      <div>
        <label class="block text-slate-700 font-semibold mb-2">Name</label>
        <input type="text" id="edit_doctor_name" name="doctor_name" class="w-full px-4 py-3 border rounded-xl" required>
      </div>

      <div>
        <label class="block text-slate-700 font-semibold mb-2">Email</label>
        <input type="email" id="edit_doctor_email" name="doctor_email" class="w-full px-4 py-3 border rounded-xl"
          required>
      </div>

      <div>
        <label class="block text-slate-700 font-semibold mb-2">Phone Number</label>
        <input type="number" id="edit_doctor_number" name="doctor_number" class="w-full px-4 py-3 border rounded-xl"
          required>
      </div>

      <div>
        <label class="block text-slate-700 font-semibold mb-2">Schedule</label>
        <div class="flex space-x-3">
          <input type="time" id="edit_doctor_schedule_from" name="doctor_schedule_from"
            class="w-1/2 px-4 py-3 border rounded-xl" required>
          <input type="time" id="edit_doctor_schedule_to" name="doctor_schedule_to"
            class="w-1/2 px-4 py-3 border rounded-xl" required>
        </div>
      </div>

      <div class="col-span-1 md:col-span-2 flex justify-end space-x-4 mt-6">
        <button type="button" id="closeEditModalBtn" class="px-5 py-3 bg-gray-400 text-white rounded-xl">Cancel</button>
        <button type="submit" class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-xl">Update</button>
      </div>
    </form>
  </div>
</div>


<script>
  const openModalBtn = document.getElementById('openModalBtn');
  const closeModalBtn = document.getElementById('closeModalBtn');
  const inputModal = document.getElementById('inputModal');

  openModalBtn.addEventListener('click', () => {
    inputModal.classList.remove('hidden');
  });

  closeModalBtn.addEventListener('click', () => {
    inputModal.classList.add('hidden');
  });

  document.addEventListener('keydown', function (event) {
    if (event.key === "Escape") {
      inputModal.classList.add('hidden');
    }
  });
</script>

<script>
  const editModal = document.getElementById('editModal');
  const closeEditModalBtn = document.getElementById('closeEditModalBtn');

  // Tombol edit
  document.querySelectorAll('.openEditBtn').forEach(btn => {
    btn.addEventListener('click', () => {
      document.getElementById('edit_doctor_id').value = btn.dataset.id;
      document.getElementById('edit_doctor_name').value = btn.dataset.name;
      document.getElementById('edit_doctor_email').value = btn.dataset.email;
      document.getElementById('edit_doctor_number').value = btn.dataset.number;
      document.getElementById('edit_doctor_schedule_from').value = btn.dataset.from;
      document.getElementById('edit_doctor_schedule_to').value = btn.dataset.to;

      editModal.classList.remove('hidden');
    });
  });

  closeEditModalBtn.addEventListener('click', () => {
    editModal.classList.add('hidden');
  });

</script>