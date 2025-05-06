<div class="container mx-auto p-6">
  <div class="bg-white shadow-lg rounded-2xl p-8">
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
      </ol>
    </nav>


    <h1 class="text-4xl font-bold text-slate-800 my-5">
      Halo
      <span
        class="bg-gradient-to-r from-indigo-500 to-purple-600 text-transparent bg-clip-text"><?= $_SESSION['user-name'] ?>!</span>
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
      <div class="p-4 bg-blue-100 rounded-xl shadow text-blue-900">
        <h2 class="text-xl font-semibold">Total Appointment</h2>
        <p class="text-2xl"><?= $data['totals'] ?></p>
      </div>
      <div class="p-4 bg-green-100 rounded-xl shadow text-green-900">
        <h2 class="text-xl font-semibold">Doctors</h2>
        <p class="text-2xl"><?= $data['total_doctors'] ?></p>
      </div>
      <div class="p-4 bg-yellow-100 rounded-xl shadow text-yellow-900">
        <h2 class="text-xl font-semibold">Completed</h2>
        <p class="text-2xl"><?= $data['total_completed'] ?></p>
      </div>
    </div>

    <!-- Table for appointments -->
    <div class="bg-white shadow-lg rounded-2xl p-6">
      <h2 class="text-2xl font-semibold text-slate-800 mb-4">History</h2>

      <table class="min-w-full bg-white border border-slate-200 rounded-lg overflow-hidden">
        <thead>
          <tr class="bg-slate-100">
            <th class="py-3 px-4 text-left text-slate-600">NO</th>
            <th class="py-3 px-4 text-left text-slate-600">PATIENT</th>
            <th class="py-3 px-4 text-left text-slate-600">DOCTOR</th>
            <th class="py-3 px-4 text-left text-slate-600">SCHEDULE</th>
          
            <th class="py-3 px-4 text-left text-slate-600">STATUS</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($data['recent_appointment'])): ?>
            <?php $count = 1; ?>
            <?php foreach ($data['recent_appointment'] as $schedule): ?>
              <tr class="border-b">
                <td class="py-3 px-4"><?= $count++ ?></td>
                <td class="py-3 px-4"><?= $schedule['patient_name'] ?></td>
                <td class="py-3 px-4"><?= $schedule['doctor_name'] ?></td>
                <td class="py-3 px-4">
                  <?php
                  $date = date('d F Y', strtotime($schedule['start_date']));
                  $start_time = date('H:i', strtotime($schedule['start_date']));
                  $end_time = date('H:i', strtotime($schedule['end_date']));
                  ?>
                  <?= $date ?><br>
                  <?= $start_time ?> - <?= $end_time ?>
                </td>
                <td class="py-3 px-4"><?= $schedule['status'] ?></td>
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


</div>