<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="mb-6">
    <h1 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Komponen</h1>
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
        Showcase library Chart.js, Dropzone, Flatpickr, dan Swiper.
    </p>
</div>

<!-- Section Navigation -->
<div class="mb-6 flex flex-wrap gap-2">
    <a href="#charts" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium rounded-full bg-blue-50 text-blue-700 dark:bg-blue-500/10 dark:text-blue-400 hover:bg-blue-100 dark:hover:bg-blue-500/20 transition-colors">
        <i data-lucide="bar-chart-3" class="w-3.5 h-3.5"></i> Chart.js
    </a>
    <a href="#dropzone" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium rounded-full bg-emerald-50 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400 hover:bg-emerald-100 dark:hover:bg-emerald-500/20 transition-colors">
        <i data-lucide="upload-cloud" class="w-3.5 h-3.5"></i> Dropzone
    </a>
    <a href="#flatpickr" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium rounded-full bg-purple-50 text-purple-700 dark:bg-purple-500/10 dark:text-purple-400 hover:bg-purple-100 dark:hover:bg-purple-500/20 transition-colors">
        <i data-lucide="calendar" class="w-3.5 h-3.5"></i> Flatpickr
    </a>
    <a href="#swiper" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium rounded-full bg-amber-50 text-amber-700 dark:bg-amber-500/10 dark:text-amber-400 hover:bg-amber-100 dark:hover:bg-amber-500/20 transition-colors">
        <i data-lucide="images" class="w-3.5 h-3.5"></i> Swiper
    </a>
</div>

<!-- =================== CHART.JS =================== -->
<section id="charts" class="mb-8">
    <div class="mb-4 flex items-center gap-2">
        <i data-lucide="bar-chart-3" class="w-5 h-5 text-blue-600"></i>
        <h2 class="text-base font-semibold tracking-tight text-gray-900 dark:text-white">Chart.js</h2>
        <span class="text-xs text-gray-500 dark:text-gray-400">5 variants</span>
    </div>

    <div class="grid gap-4 lg:grid-cols-2">
        <!-- Line Chart -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-card dark:bg-gray-800 dark:border-gray-700 p-5">
            <div class="mb-3">
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Trafik Mingguan</h3>
                <p class="text-xs text-gray-500 dark:text-gray-400">Line chart — 7 hari terakhir</p>
            </div>
            <div class="h-64"><canvas id="lineChart"></canvas></div>
        </div>

        <!-- Bar Chart -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-card dark:bg-gray-800 dark:border-gray-700 p-5">
            <div class="mb-3">
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Pendaftaran Per Bulan</h3>
                <p class="text-xs text-gray-500 dark:text-gray-400">Bar chart — 12 bulan</p>
            </div>
            <div class="h-64"><canvas id="barChart"></canvas></div>
        </div>

        <!-- Area Chart -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-card dark:bg-gray-800 dark:border-gray-700 p-5">
            <div class="mb-3">
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Sesi Aktif</h3>
                <p class="text-xs text-gray-500 dark:text-gray-400">Area chart dengan gradient fill</p>
            </div>
            <div class="h-64"><canvas id="areaChart"></canvas></div>
        </div>

        <!-- Doughnut Chart -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-card dark:bg-gray-800 dark:border-gray-700 p-5">
            <div class="mb-3">
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Distribusi Role</h3>
                <p class="text-xs text-gray-500 dark:text-gray-400">Doughnut chart</p>
            </div>
            <div class="h-64"><canvas id="doughnutChart"></canvas></div>
        </div>

        <!-- Radar Chart -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-card dark:bg-gray-800 dark:border-gray-700 p-5 lg:col-span-2">
            <div class="mb-3">
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Perbandingan Metrik</h3>
                <p class="text-xs text-gray-500 dark:text-gray-400">Radar chart — tim A vs tim B</p>
            </div>
            <div class="h-72"><canvas id="radarChart"></canvas></div>
        </div>
    </div>
</section>

<!-- =================== DROPZONE =================== -->
<section id="dropzone" class="mb-8">
    <div class="mb-4 flex items-center gap-2">
        <i data-lucide="upload-cloud" class="w-5 h-5 text-emerald-600"></i>
        <h2 class="text-base font-semibold tracking-tight text-gray-900 dark:text-white">Dropzone</h2>
        <span class="text-xs text-gray-500 dark:text-gray-400">Multiple file + preview</span>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl shadow-card dark:bg-gray-800 dark:border-gray-700 p-5">
        <form id="demoDropzone" class="dropzone-custom dropzone !border-2 !border-dashed !border-gray-300 dark:!border-gray-600 !rounded-lg !bg-gray-50 dark:!bg-gray-900/30 !min-h-[180px]" action="#">
            <div class="dz-message flex flex-col items-center justify-center py-8 pointer-events-none">
                <div class="w-12 h-12 rounded-full bg-emerald-50 dark:bg-emerald-500/10 flex items-center justify-center mb-3">
                    <i data-lucide="cloud-upload" class="w-6 h-6 text-emerald-600 dark:text-emerald-400"></i>
                </div>
                <p class="text-sm font-medium text-gray-900 dark:text-white">Seret &amp; lepas file di sini</p>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">atau klik untuk memilih (max 5MB, images + PDF)</p>
            </div>
        </form>
        <p class="mt-3 text-xs text-gray-500 dark:text-gray-400">
            <i data-lucide="info" class="w-3.5 h-3.5 inline-block -mt-0.5"></i>
            Demo client-side. Upload tidak dikirim ke server.
        </p>
    </div>
</section>

<!-- =================== FLATPICKR =================== -->
<section id="flatpickr" class="mb-8">
    <div class="mb-4 flex items-center gap-2">
        <i data-lucide="calendar" class="w-5 h-5 text-purple-600"></i>
        <h2 class="text-base font-semibold tracking-tight text-gray-900 dark:text-white">Flatpickr</h2>
        <span class="text-xs text-gray-500 dark:text-gray-400">Locale Indonesia</span>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl shadow-card dark:bg-gray-800 dark:border-gray-700 p-5">
        <div class="grid gap-4 md:grid-cols-3">
            <div>
                <label for="fpDate" class="block mb-1.5 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                <input type="text" id="fpDate" placeholder="Pilih tanggal..."
                       class="w-full px-3 py-2 text-sm bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-gray-900 dark:text-white transition">
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Format: d F Y</p>
            </div>
            <div>
                <label for="fpDateTime" class="block mb-1.5 text-sm font-medium text-gray-900 dark:text-white">Tanggal &amp; Waktu</label>
                <input type="text" id="fpDateTime" placeholder="Pilih tanggal dan waktu..."
                       class="w-full px-3 py-2 text-sm bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-gray-900 dark:text-white transition">
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Format: d F Y H:i</p>
            </div>
            <div>
                <label for="fpRange" class="block mb-1.5 text-sm font-medium text-gray-900 dark:text-white">Rentang Tanggal</label>
                <input type="text" id="fpRange" placeholder="Pilih rentang..."
                       class="w-full px-3 py-2 text-sm bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-gray-900 dark:text-white transition">
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Mode: range</p>
            </div>
        </div>
    </div>
</section>

<!-- =================== SWIPER =================== -->
<section id="swiper" class="mb-8">
    <div class="mb-4 flex items-center gap-2">
        <i data-lucide="images" class="w-5 h-5 text-amber-600"></i>
        <h2 class="text-base font-semibold tracking-tight text-gray-900 dark:text-white">Swiper</h2>
        <span class="text-xs text-gray-500 dark:text-gray-400">Image + Cards carousel</span>
    </div>

    <!-- Image Carousel -->
    <div class="bg-white border border-gray-200 rounded-xl shadow-card dark:bg-gray-800 dark:border-gray-700 p-5 mb-4">
        <div class="mb-3">
            <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Image Carousel</h3>
            <p class="text-xs text-gray-500 dark:text-gray-400">Navigation + pagination + autoplay</p>
        </div>
        <div class="swiper imageSwiper rounded-lg overflow-hidden">
            <div class="swiper-wrapper">
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <div class="swiper-slide">
                        <img src="https://picsum.photos/800/360?random=<?= $i ?>" alt="Slide <?= $i ?>" class="w-full h-[300px] object-cover">
                    </div>
                <?php endfor; ?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev !text-white"></div>
            <div class="swiper-button-next !text-white"></div>
        </div>
    </div>

    <!-- Cards Carousel -->
    <div class="bg-white border border-gray-200 rounded-xl shadow-card dark:bg-gray-800 dark:border-gray-700 p-5">
        <div class="mb-3">
            <h3 class="text-sm font-semibold text-gray-900 dark:text-white">Cards Carousel</h3>
            <p class="text-xs text-gray-500 dark:text-gray-400">Responsive breakpoints (1/2/3/4 slides)</p>
        </div>
        <div class="swiper cardsSwiper">
            <div class="swiper-wrapper pb-10">
                <?php
                $cards = [
                    ['icon' => 'trending-up',   'color' => 'from-blue-500 to-blue-600',       'label' => 'Revenue',     'value' => 'Rp 12,4 jt'],
                    ['icon' => 'users',         'color' => 'from-emerald-500 to-teal-600',    'label' => 'Pengguna',    'value' => '1.248'],
                    ['icon' => 'shopping-cart', 'color' => 'from-purple-500 to-pink-600',     'label' => 'Pesanan',     'value' => '342'],
                    ['icon' => 'activity',      'color' => 'from-amber-500 to-orange-600',    'label' => 'Sesi Aktif',  'value' => '89'],
                    ['icon' => 'star',          'color' => 'from-rose-500 to-red-600',        'label' => 'Rating',      'value' => '4.8'],
                    ['icon' => 'package',       'color' => 'from-indigo-500 to-blue-600',     'label' => 'Produk',      'value' => '126'],
                ];
                foreach ($cards as $c):
                ?>
                    <div class="swiper-slide">
                        <div class="p-5 bg-gradient-to-br <?= $c['color'] ?> rounded-xl text-white h-full">
                            <div class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-white/20 backdrop-blur">
                                <i data-lucide="<?= $c['icon'] ?>" class="w-5 h-5"></i>
                            </div>
                            <p class="mt-4 text-xs font-medium uppercase tracking-wider opacity-90"><?= esc($c['label']) ?></p>
                            <p class="mt-1 text-2xl font-semibold tracking-tight"><?= esc($c['value']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- Inline style overrides for library dark mode -->
<style>
    /* Dropzone custom */
    .dropzone-custom.dropzone .dz-preview .dz-image { border-radius: 0.5rem; }
    .dropzone-custom.dropzone:hover { border-color: rgb(16 185 129) !important; background-color: rgb(236 253 245 / 0.4) !important; }
    .dark .dropzone-custom.dropzone:hover { background-color: rgb(16 185 129 / 0.05) !important; }

    /* Flatpickr dark mode */
    .dark .flatpickr-calendar { background: rgb(31 41 55); border-color: rgb(55 65 81); color: rgb(243 244 246); box-shadow: 0 4px 12px rgb(0 0 0 / 0.4); }
    .dark .flatpickr-months .flatpickr-month,
    .dark .flatpickr-current-month .flatpickr-monthDropdown-months,
    .dark .flatpickr-weekdays,
    .dark span.flatpickr-weekday { background: rgb(31 41 55); color: rgb(243 244 246); }
    .dark .flatpickr-day { color: rgb(229 231 235); }
    .dark .flatpickr-day.today { border-color: rgb(59 130 246); }
    .dark .flatpickr-day:hover,
    .dark .flatpickr-day.prevMonthDay:hover,
    .dark .flatpickr-day.nextMonthDay:hover { background: rgb(55 65 81); border-color: rgb(55 65 81); }
    .dark .flatpickr-day.selected,
    .dark .flatpickr-day.startRange,
    .dark .flatpickr-day.endRange,
    .dark .flatpickr-day.selected:hover { background: rgb(37 99 235); border-color: rgb(37 99 235); color: #fff; }
    .dark .flatpickr-day.inRange { background: rgb(30 58 138); border-color: rgb(30 58 138); box-shadow: -5px 0 0 rgb(30 58 138), 5px 0 0 rgb(30 58 138); }
    .dark .flatpickr-day.prevMonthDay,
    .dark .flatpickr-day.nextMonthDay { color: rgb(107 114 128); }
    .dark .numInputWrapper span.arrowUp::after { border-bottom-color: rgb(229 231 235); }
    .dark .numInputWrapper span.arrowDown::after { border-top-color: rgb(229 231 235); }
    .dark .flatpickr-time input,
    .dark .flatpickr-time .flatpickr-am-pm { color: rgb(229 231 235); background: rgb(31 41 55); }
    .dark .flatpickr-time input:hover,
    .dark .flatpickr-time .flatpickr-am-pm:hover { background: rgb(55 65 81); }

    /* Swiper tweaks */
    .swiper-button-prev, .swiper-button-next { --swiper-navigation-size: 22px; background: rgb(0 0 0 / 0.35); width: 36px; height: 36px; border-radius: 9999px; }
    .swiper-button-prev:hover, .swiper-button-next:hover { background: rgb(0 0 0 / 0.55); }
    .swiper-pagination-bullet-active { background: rgb(37 99 235); }
    .dark .swiper-pagination-bullet { background: rgb(156 163 175); }
    .dark .swiper-pagination-bullet-active { background: rgb(96 165 250); }
</style>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // ============ CHART.JS ============
    const isDark = () => document.documentElement.classList.contains('dark');
    const themeColors = () => ({
        text: isDark() ? '#9ca3af' : '#6b7280',
        grid: isDark() ? 'rgba(75,85,99,0.3)' : 'rgba(229,231,235,0.8)',
    });

    Chart.defaults.font.family = "'Geist', ui-sans-serif, system-ui, sans-serif";
    Chart.defaults.font.size = 12;

    function applyTheme(chart) {
        const c = themeColors();
        chart.options.scales = chart.options.scales || {};
        ['x','y','r'].forEach(k => {
            if (chart.options.scales[k]) {
                if (chart.options.scales[k].ticks) chart.options.scales[k].ticks.color = c.text;
                if (chart.options.scales[k].grid) chart.options.scales[k].grid.color = c.grid;
                if (chart.options.scales[k].angleLines) chart.options.scales[k].angleLines.color = c.grid;
                if (chart.options.scales[k].pointLabels) chart.options.scales[k].pointLabels.color = c.text;
            }
        });
        if (chart.options.plugins && chart.options.plugins.legend && chart.options.plugins.legend.labels) {
            chart.options.plugins.legend.labels.color = c.text;
        }
        chart.update();
    }

    const baseOpts = () => ({
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { labels: { color: themeColors().text, boxWidth: 12, padding: 16 } },
        },
        scales: {
            x: { ticks: { color: themeColors().text }, grid: { color: themeColors().grid, drawBorder: false } },
            y: { ticks: { color: themeColors().text }, grid: { color: themeColors().grid, drawBorder: false }, beginAtZero: true },
        },
    });

    // Line
    const lineChart = new Chart(document.getElementById('lineChart'), {
        type: 'line',
        data: {
            labels: ['Sen','Sel','Rab','Kam','Jum','Sab','Min'],
            datasets: [{
                label: 'Pengunjung',
                data: [320, 450, 380, 520, 610, 480, 540],
                borderColor: '#3b82f6',
                backgroundColor: 'rgba(59,130,246,0.1)',
                tension: 0.35,
                fill: true,
                pointBackgroundColor: '#3b82f6',
                pointRadius: 4,
                pointHoverRadius: 6,
            }],
        },
        options: baseOpts(),
    });

    // Bar
    const barChart = new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
            datasets: [{
                label: 'Pendaftaran',
                data: [45, 52, 38, 65, 72, 88, 95, 78, 82, 91, 105, 118],
                backgroundColor: '#10b981',
                borderRadius: 6,
                borderSkipped: false,
            }],
        },
        options: baseOpts(),
    });

    // Area
    const areaCtx = document.getElementById('areaChart').getContext('2d');
    const areaGradient = areaCtx.createLinearGradient(0, 0, 0, 240);
    areaGradient.addColorStop(0, 'rgba(168,85,247,0.35)');
    areaGradient.addColorStop(1, 'rgba(168,85,247,0.0)');
    const areaChart = new Chart(areaCtx, {
        type: 'line',
        data: {
            labels: ['00:00','04:00','08:00','12:00','16:00','20:00','24:00'],
            datasets: [{
                label: 'Sesi aktif',
                data: [12, 8, 24, 56, 78, 64, 32],
                borderColor: '#a855f7',
                backgroundColor: areaGradient,
                fill: true,
                tension: 0.4,
                pointRadius: 0,
                borderWidth: 2,
            }],
        },
        options: baseOpts(),
    });

    // Doughnut
    const doughnutChart = new Chart(document.getElementById('doughnutChart'), {
        type: 'doughnut',
        data: {
            labels: ['Admin','Editor','Viewer','Guest'],
            datasets: [{
                data: [12, 32, 78, 24],
                backgroundColor: ['#3b82f6','#10b981','#a855f7','#f59e0b'],
                borderWidth: 0,
                hoverOffset: 6,
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '65%',
            plugins: {
                legend: { position: 'bottom', labels: { color: themeColors().text, boxWidth: 10, padding: 12 } },
            },
        },
    });

    // Radar
    const radarChart = new Chart(document.getElementById('radarChart'), {
        type: 'radar',
        data: {
            labels: ['Kecepatan','Reliabilitas','UX','Desain','Performa','Aksesibilitas'],
            datasets: [
                {
                    label: 'Tim A',
                    data: [85, 72, 90, 78, 88, 82],
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59,130,246,0.15)',
                    borderWidth: 2,
                },
                {
                    label: 'Tim B',
                    data: [72, 88, 75, 92, 70, 86],
                    borderColor: '#f43f5e',
                    backgroundColor: 'rgba(244,63,94,0.15)',
                    borderWidth: 2,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom', labels: { color: themeColors().text, boxWidth: 12, padding: 16 } },
            },
            scales: {
                r: {
                    beginAtZero: true,
                    suggestedMax: 100,
                    ticks: { color: themeColors().text, backdropColor: 'transparent' },
                    grid: { color: themeColors().grid },
                    angleLines: { color: themeColors().grid },
                    pointLabels: { color: themeColors().text },
                },
            },
        },
    });

    const allCharts = [lineChart, barChart, areaChart, doughnutChart, radarChart];

    // Re-theme charts when dark mode toggled
    const themeBtn = document.getElementById('theme-toggle');
    if (themeBtn) {
        themeBtn.addEventListener('click', () => setTimeout(() => allCharts.forEach(applyTheme), 50));
    }

    // ============ DROPZONE ============
    new Dropzone('#demoDropzone', {
        url: '#',
        autoProcessQueue: false,
        maxFiles: 10,
        maxFilesize: 5, // MB
        acceptedFiles: 'image/*,.pdf',
        addRemoveLinks: true,
        dictRemoveFile: 'Hapus',
        dictCancelUpload: 'Batal',
        dictFileTooBig: 'Ukuran file terlalu besar (max {{maxFilesize}}MB).',
        dictInvalidFileType: 'Tipe file tidak didukung.',
        dictResponseError: 'Terjadi kesalahan server.',
        dictMaxFilesExceeded: 'Tidak bisa upload lebih dari {{maxFiles}} file.',
    });

    // ============ FLATPICKR ============
    if (window.flatpickr) {
        flatpickr.localize(flatpickr.l10ns.id);
        flatpickr('#fpDate', { dateFormat: 'd F Y', altInput: false });
        flatpickr('#fpDateTime', { enableTime: true, dateFormat: 'd F Y H:i', time_24hr: true });
        flatpickr('#fpRange', { mode: 'range', dateFormat: 'd F Y' });
    }

    // ============ SWIPER ============
    new Swiper('.imageSwiper', {
        loop: true,
        autoplay: { delay: 4000, disableOnInteraction: false },
        pagination: { el: '.imageSwiper .swiper-pagination', clickable: true },
        navigation: { nextEl: '.imageSwiper .swiper-button-next', prevEl: '.imageSwiper .swiper-button-prev' },
    });

    new Swiper('.cardsSwiper', {
        slidesPerView: 1,
        spaceBetween: 16,
        pagination: { el: '.cardsSwiper .swiper-pagination', clickable: true },
        breakpoints: {
            640: { slidesPerView: 2 },
            768: { slidesPerView: 3 },
            1024: { slidesPerView: 4 },
        },
    });
});
</script>
<?= $this->endSection() ?>
