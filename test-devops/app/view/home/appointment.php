<div class="flex justify-center mt-5">
  <div class="bg-white shadow-lg rounded-2xl p-6 relative w-full max-w-7xl">
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
            <a href="<?= APP_PATH;?>/home/appointment"
              class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Appointment</a>
          </div>
        </li>
      </ol>
    </nav>
    <button id="openModalBtn" class="absolute top-4 right-4 bg-gradient-to-r from-indigo-500 to-purple-600 text-white py-2 px-4 rounded-lg hover:from-indigo-400 hover:to-purple-500">
      + NEW APPOINTMENT
    </button>
    <table class="min-w-full bg-white border border-slate-200 rounded-lg overflow-hidden mt-10">
        <thead>
          <tr class="bg-gradient-to-r from-indigo-100 to-purple-100">
            <th class="py-3 px-4 text-left text-slate-600">NO</th>
            <th class="py-3 px-4 text-left text-slate-600">PATIENT</th>
            <th class="py-3 px-4 text-left text-slate-600">DOCTOR</th>
            <th class="py-3 px-4 text-left text-slate-600">SCHEDULE</th>
            <th class="py-3 px-4 text-left text-slate-600">STATUS</th>
            <th class="py-3 px-4 text-left text-slate-600">ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($data['schedules'])): ?>
            <?php $count = 1; ?>
            <?php foreach ($data['schedules'] as $schedule): ?>
              <tr class="border-b hover:bg-slate-50">
                <td class="py-3 px-4"><?= $count++ ?></td>
                <td class="py-3 px-4"><?= htmlspecialchars($schedule['patient_name']) ?></td>
                <td class="py-3 px-4"><?= htmlspecialchars($schedule['doctor_name']) ?></td>
                <td class="py-3 px-4">
                  <?php
                  $date = date('d F Y', strtotime($schedule['start_date']));
                  $start_time = date('H:i', strtotime($schedule['start_date']));
                  $end_time = date('H:i', strtotime($schedule['end_date']));
                  ?>
                  <?= htmlspecialchars($date) ?><br>
                  <?= htmlspecialchars($start_time) ?> - <?= htmlspecialchars($end_time) ?>
                </td>
                <td class="py-3 px-4"><?= htmlspecialchars($schedule['status']) ?></td>
                <td class="text-center space-x-3">
                  <button type="button" class="btn btn-info openEditBtn text-indigo-600 hover:text-indigo-800 transition duration-300" data-id="<?= $schedule['id'] ?>" data-patient="<?= htmlspecialchars($schedule['patient_name']) ?>" data-doctor="<?= htmlspecialchars($schedule['doctor_name']) ?>" data-status="<?= htmlspecialchars($schedule['status']) ?>" data-start="<?= $schedule['start_date'] ?>" data-end="<?= $schedule['end_date'] ?>">
                    <i class="fas fa-edit"></i>
                  </button>

                  <!-- <button type="button" class="btn btn-success text-green-600 hover:text-green-800 transition duration-300" onclick="getAppointmentInfo('<?= $schedule['id']; ?>')">
                    <i class="fas fa-info-circle"></i>
                  </button> -->

                  <a href="<?= APP_PATH; ?>/home/delete_appointment/<?= $schedule['id']; ?>" class="btn btn-danger text-red-600 hover:text-red-800 transition duration-300">
                    <i class="fas fa-trash-alt"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="7" class="py-3 px-4 text-center text-slate-600">No appointments found</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal new data -->
<div id="inputModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center hidden">
  <div class="bg-white p-8 rounded-3xl shadow-xl max-w-5xl w-full transform transition-all duration-500 scale-95 hover:scale-100">
    <h2 class="text-3xl font-semibold text-slate-800 mb-6 text-center">Add Appointment</h2>

    <!-- Modal Form -->
    <form action="<?= APP_PATH; ?>/home/new_appointment" method="POST" class="space-y-6">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="mb-4">
          <label for="patient_name" class="block text-lg font-medium text-slate-600">Patient Name</label>
          <input type="text" id="patient_name" name="patient_name" class="w-full p-3 border-2 border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300" placeholder="Enter patient's name" required>
        </div>

        <div class="mb-4">
          <label for="doctor_name" class="block text-lg font-medium text-slate-600">Doctor Name</label>
          <input type="text" id="doctor_name" name="doctor_name" class="w-full p-3 border-2 border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300" placeholder="Enter doctor's name" required>
        </div>

        <div class="mb-4">
          <label for="status" class="block text-lg font-medium text-slate-600">Status</label>
          <select id="status" name="status" class="w-full p-3 border-2 border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300">
            <option value="scheduled">Scheduled</option>
            <option value="on going">On Going</option>
            <option value="completed">Completed</option>
            <option value="cancelled">Cancelled</option>
          </select>
        </div>

        <div class="mb-4">
          <label for="start_date" class="block text-lg font-medium text-slate-600">Start Date and Time</label>
          <input type="datetime-local" id="start_date" name="start_date" class="w-full p-3 border-2 border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300" required>
        </div>

        <div class="mb-4">
          <label for="end_date" class="block text-lg font-medium text-slate-600">End Date and Time</label>
          <input type="datetime-local" id="end_date" name="end_date" class="w-full p-3 border-2 border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300" required>
        </div>
      </div>

      <div class="flex justify-end gap-6">
        <button type="button" id="closeModalBtn" class="bg-gray-500 text-white p-3 rounded-lg hover:bg-gray-400 transition duration-300">Cancel</button>
        <button type="submit" class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white p-3 rounded-lg hover:from-indigo-400 hover:to-purple-500 transition duration-300">Save</button>
      </div>
    </form>
  </div>
</div>

<!-- modal edit data -->
<div id="editModal" class="fixed inset-0 bg-slate-950/50 flex justify-center items-center hidden">
  <div class="bg-white p-8 rounded-3xl shadow-xl max-w-5xl w-full transform transition-all duration-500 scale-95 hover:scale-100">
    <h2 class="text-3xl font-semibold text-slate-800 mb-6 text-center">Edit Appointment</h2>

    <form action="<?= APP_PATH; ?>/home/update_appointment" method="POST" class="space-y-6">
      <input type="hidden" name="edit_id" id="edit_id">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="mb-4">
          <label for="edit_patient_name" class="block text-lg font-medium text-slate-600">Patient Name</label>
          <input type="text" id="edit_patient_name" name="edit_patient_name" class="w-full p-3 border-2 border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300" required>
        </div>

        <div class="mb-4">
          <label for="edit_doctor_name" class="block text-lg font-medium text-slate-600">Doctor Name</label>
          <input type="text" id="edit_doctor_name" name="edit_doctor_name" class="w-full p-3 border-2 border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300" required>
        </div>

        <div class="mb-4">
          <label for="edit_status" class="block text-lg font-medium text-slate-600">Status</label>
          <select id="edit_status" name="edit_status" class="w-full p-3 border-2 border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300">
            <option value="scheduled">Scheduled</option>
            <option value="on going">On Going</option>
            <option value="completed">Completed</option>
            <option value="cancelled">Cancelled</option>
          </select>
        </div>

        <div class="mb-4">
          <label for="edit_start_date" class="block text-lg font-medium text-slate-600">Start Date and Time</label>
          <input type="datetime-local" id="edit_start_date" name="edit_start_date" class="w-full p-3 border-2 border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300" required>
        </div>

        <div class="mb-4">
          <label for="edit_end_date" class="block text-lg font-medium text-slate-600">End Date and Time</label>
          <input type="datetime-local" id="edit_end_date" name="edit_end_date" class="w-full p-3 border-2 border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300" required>
        </div>
      </div>

      <div class="flex justify-end gap-6">
        <button type="button" id="closeEditModalBtn" class="bg-gray-500 text-white p-3 rounded-lg hover:bg-gray-400 transition duration-300">Cancel</button>
        <button type="submit" class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white p-3 rounded-lg hover:from-indigo-400 hover:to-purple-500 transition duration-300">Update</button>
      </div>
    </form>
  </div>
</div>

<script>
  // Open edit modal
document.querySelectorAll('.openEditBtn').forEach(button => {
  button.addEventListener('click', (event) => {
    const modal = document.getElementById('editModal');
    
    // Use event.currentTarget to get the correct element
    const patientName = event.currentTarget.getAttribute('data-patient');
    const doctorName = event.currentTarget.getAttribute('data-doctor');
    const status = event.currentTarget.getAttribute('data-status');
    const startDate = event.currentTarget.getAttribute('data-start');
    const endDate = event.currentTarget.getAttribute('data-end');
    const appointmentId = event.currentTarget.getAttribute('data-id');
    
    // Fill the modal with the data
    document.getElementById('edit_patient_name').value = patientName;
    document.getElementById('edit_doctor_name').value = doctorName;
    document.getElementById('edit_status').value = status;
    document.getElementById('edit_start_date').value = startDate;
    document.getElementById('edit_end_date').value = endDate;
    document.getElementById('edit_id').value = appointmentId;
    
    // Show the modal
    modal.classList.remove('hidden');
  });
});

// Close the edit modal
document.getElementById('closeEditModalBtn').addEventListener('click', () => {
  document.getElementById('editModal').classList.add('hidden');
});

// Close the modal if you click outside
document.getElementById('editModal').addEventListener('click', (event) => {
  if (event.target === document.getElementById('editModal')) {
    document.getElementById('editModal').classList.add('hidden');
  }
});

</script>
