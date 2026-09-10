const DOSEN_DATA = [
  {
    nama: "Dr. Abdullah Rakhman, S.T.P., M.M.",
    prodi: "Manajemen",
    gsName: "ABDULAH RAKHMAN",
    gsUser: "P_Rdw4AAAAAJ",
    keahlian: "Manajemen Agribisnis & Operasional"
  },
  {
    nama: "Akhmad Budi, S.Kom., M.M., M.Kom.",
    prodi: "Teknik Informatika",
    gsName: "AKHMAD BUDI",
    gsUser: "dZ5sEPAAAAAJ",
    keahlian: "Sistem Informasi & Rekayasa Perangkat Lunak"
  },
  {
    nama: "Amelia Sandra, S.E., Ak., M.Si., M.Ak.",
    prodi: "Akuntansi",
    gsName: "AMELIA SANDRA",
    gsUser: "tehyWEoAAAAJ",
    keahlian: "Akuntansi Keuangan & Perpajakan"
  },
  {
    nama: "Drs. Ari Hadi Prasetyo MM., M.Ak.",
    prodi: "Akuntansi",
    gsName: "ARI HADI PRASETYO",
    gsUser: "59AsPQIAAAAJ",
    keahlian: "Audit & Sistem Pengendalian Manajemen"
  },
  {
    nama: "Bernadetta Dwi Suatmi, S.E., MPP, Ph.D.",
    prodi: "Magister Manajemen",
    gsName: "BERNADETTA DWI SUATMI",
    gsUser: "_86z7FgAAAAJ",
    keahlian: "Kebijakan Publik & Ekonomi Pembangunan"
  },
  {
    nama: "Prof. Dr. Ir. Bilson Simamora, M.M.",
    prodi: "Manajemen",
    gsName: "BILSON SIMAMORA",
    gsUser: "S3bpBlIAAAAJ",
    keahlian: "Riset Pemasaran & Perilaku Konsumen"
  },
  {
    nama: "Bram Bravo, S.Kom., M.Kom.",
    prodi: "Sistem Informasi",
    gsName: "BRAM BRAVO",
    gsUser: null,
    keahlian: "Analisis & Perancangan Sistem"
  },
  {
    nama: "Brastoro, S.E., M.M.",
    prodi: "Administrasi Bisnis",
    gsName: "BRASTORO",
    gsUser: "0gvVyX4AAAAJ",
    keahlian: "Manajemen Strategik & Organisasi"
  },
  {
    nama: "Budi Wasito, S.Kom., M.M., M.Kom.",
    prodi: "Sistem Informasi",
    gsName: "BUDI WASITO",
    gsUser: "-D-Mq3cAAAAJ",
    keahlian: "Manajemen Proyek TI & Infrastruktur Jaringan"
  },
  {
    nama: "Dr. Carmel Meiden, S.E., M.Si., Ak, CA, CSRA.",
    prodi: "Magister Akuntansi",
    gsName: "CARMEL MEIDEN",
    gsUser: "efiGkQcAAAAJ",
    keahlian: "Corporate Governance & Sustainability Reporting"
  },
  {
    nama: "Deavvy M.R.Y. Johassan, S.Sos., M.Si.",
    prodi: "Ilmu Komunikasi",
    gsName: "DEAVVY M.R.Y. JOHASSAN",
    gsUser: "vtyH6MEAAAAJ",
    keahlian: "Hubungan Masyarakat & Komunikasi Massa"
  },
  {
    nama: "Ir. Dergibson Siagian, M.M.",
    prodi: "Manajemen",
    gsName: "DERGIBSON SIAGIAN",
    gsUser: "Ru1ZZRQAAAAJ",
    keahlian: "Statistika Bisnis & Manajemen Operasional"
  },
  {
    nama: "Dra. Elisabeth Vita Mutiarawati, M.M.",
    prodi: "Manajemen",
    gsName: "ELISABETH VITA MUTIARAWATI",
    gsUser: null,
    keahlian: "Manajemen Keuangan & Kewirausahaan"
  },
  {
    nama: "Dr. Ir. Elfrida Viesta Napitupulu, M.M.",
    prodi: "Magister Akuntansi",
    gsName: "ELFRIDA VIESTA NAPITUPULU",
    gsUser: "g_8hyAQAAAAJ",
    keahlian: "Manajemen Keuangan Korporat & Akuntansi"
  },
  {
    nama: "Elis Sondang Dasawaty, S.Kom., M.M, M.Kom.",
    prodi: "Sistem Informasi",
    gsName: "ELIS SONDANG DASAWATY",
    gsUser: "IckW0PcAAAAJ",
    keahlian: "Pemrograman Web & Sistem Informasi Manajemen"
  },
  {
    nama: "Dr. Erna Sari, S.Sos., MAB, M.H.",
    prodi: "Administrasi Bisnis",
    gsName: "ERNA SARI",
    gsUser: "B7wVo3YAAAAJ",
    keahlian: "Hukum Bisnis & Administrasi Perkantoran"
  },
  {
    nama: "Prof. Dr. Hanif Ismail, S.E., AK., M.AK.",
    prodi: "Magister Akuntansi",
    gsName: "HANIF ISMAIL",
    gsUser: "BRmKhcoAAAAJ",
    keahlian: "Akuntansi Manajemen & Teori Akuntansi"
  },
  {
    nama: "Dr. Hendratmoko, ST., M.Si.",
    prodi: "Magister Manajemen",
    gsName: "HENDRATMOKO",
    gsUser: "7742nQEAAAAJ",
    keahlian: "Sistem Informasi Sumber Daya Manusia"
  },
  {
    nama: "Dr. Ir. Hisar Sirait, M.A.",
    prodi: "Administrasi Bisnis",
    gsName: "HISAR SIRAIT",
    gsUser: "SXXGPpYAAAAJ",
    keahlian: "Ekonomi Manajerial & Kebijakan Bisnis"
  },
  {
    nama: "Dr. Imam Nuraryo, S.Sos., M.A. (Comms)",
    prodi: "Ilmu Komunikasi",
    gsName: "IMAM NURARYO",
    gsUser: "UqsNMEgAAAAJ",
    keahlian: "Komunikasi Politik & Media Baru"
  },
  {
    nama: "Kristin Handayani, S.Si., M.M.",
    prodi: "Manajemen",
    gsName: "KRISTIN HANDAYANI",
    gsUser: "1RqS084AAAAJ",
    keahlian: "Manajemen Sumber Daya Manusia"
  },
  {
    nama: "Leonard Pangaribuan, S.E., M.M., M.Ak., Ak., CPA",
    prodi: "Akuntansi",
    gsName: "LEONARD PANGARIBUAN",
    gsUser: "kh0dfWMAAAAJ",
    keahlian: "Audit Keuangan & Standar Akuntansi Keuangan"
  },
  {
    nama: "Dr. M. Budi Widiyo Iryanto, S.E, M.E.",
    prodi: "Magister Manajemen",
    gsName: "M. BUDI WIDIYO IRYANTO",
    gsUser: "M-ie2F4AAAAJ",
    keahlian: "Ekonomi Mikro Terapan & Manajemen Strategik"
  },
  {
    nama: "Martha Ayerza Esra, S.E., M.M.",
    prodi: "Manajemen",
    gsName: "MARTHA AYERZA ESRA",
    gsUser: "LZaDmY4AAAAJ",
    keahlian: "Perilaku Keorganisasian & Manajemen SDM"
  },
  {
    nama: "Morryessa Brandinie, S.E., M.M.",
    prodi: "Manajemen",
    gsName: "MORRYESSA BRANDINIE",
    gsUser: "i7xpFksAAAAJ",
    keahlian: "Manajemen Pemasaran Jasa & E-Commerce"
  },
  {
    nama: "Muhammad Akbar Maulana, S.Kom., M.Kom.",
    prodi: "Teknik Informatika",
    gsName: "MUHAMMAD AKBAR MAULANA",
    gsUser: "GCFacMIAAAAJ",
    keahlian: "Kecerdasan Buatan & Pemrosesan Citra Digital"
  },
  {
    nama: "Dr. Much. Aria Wahyudi, S.E., M.M.",
    prodi: "Magister Manajemen",
    gsName: "MUHAMMAD ARIA WAHYUDI",
    gsUser: "X2e6d3IAAAAJ",
    keahlian: "Manajemen Pemasaran Strategik & Bisnis"
  },
  {
    nama: "Muhammad Fuad, S.E., M.P.",
    prodi: "Administrasi Bisnis",
    gsName: "MUHAMMAD FUAD",
    gsUser: "EBAFywcAAAAJ",
    keahlian: "Kewirausahaan & Pengembangan Bisnis"
  },
  {
    nama: "Ir. Liaw Bun Fa, S.E., M.M.",
    prodi: "Manajemen",
    gsName: "NG BUN FA",
    gsUser: "lbX-T3EAAAAJ",
    keahlian: "Sistem Informasi Bisnis & Manajemen Operasional"
  },
  {
    nama: "Prima Apriwenni, S.E., Ak., M.M., M.Ak.",
    prodi: "Akuntansi",
    gsName: "PRIMA APRIWENNI",
    gsUser: "--ogPTAAAAAJ",
    keahlian: "Akuntansi Keuangan Menengah & Audit Internal"
  },
  {
    nama: "Ratih Nur Setyaningsih, S.A.B., M.Si.",
    prodi: "Administrasi Bisnis",
    gsName: "RATIH NUR SETYANINGSIH",
    gsUser: "CXa7dbkAAAAJ",
    keahlian: "Manajemen Pemasaran & Perilaku Organisasi"
  },
  {
    nama: "Rina Rahmadani, S.Sos., M.I.Kom.",
    prodi: "Ilmu Komunikasi",
    gsName: "RINA RAHMADANI",
    gsUser: "LmFQDLsAAAAJ",
    keahlian: "Komunikasi Pemasaran & Media Penyiaran"
  },
  {
    nama: "Rita Eka Setianingsih, S.E, M.M.",
    prodi: "Manajemen",
    gsName: "RITA EKA SETIANINGSIH",
    gsUser: "C3GHZLkAAAAJ",
    keahlian: "Manajemen Operasional & Rantai Pasok"
  },
  {
    nama: "Rizka Indri Arfianti, S.E., Ak., M.M., M.Ak.",
    prodi: "Akuntansi",
    gsName: "RIZKA INDRI ARFIANTI",
    gsUser: "eIP3QN0AAAAJ",
    keahlian: "Akuntansi Sektor Publik & Pelaporan Keuangan"
  },
  {
    nama: "Rizqy Aziz Basuki, S.AB., M.AB.",
    prodi: "Administrasi Bisnis",
    gsName: "RIZQY AZIZ BASUKI",
    gsUser: "YP8N8zcAAAAJ",
    keahlian: "Administrasi Bisnis & Tata Kelola Perusahaan"
  },
  {
    nama: "Rona Guines Purnasiwi, S.Kom., M.Kom",
    prodi: "Sistem Informasi",
    gsName: "RONA GUINES PURNASIWI",
    gsUser: "b2oS2sQAAAAJ",
    keahlian: "Rekayasa Web & Manajemen Database"
  },
  {
    nama: "Dra. Rosida Simatupang, M.I.Kom.",
    prodi: "Ilmu Komunikasi",
    gsName: "ROSIDA SIMATUPANG",
    gsUser: "2yzki00AAAAJ",
    keahlian: "Jurnalistik & Etika Komunikasi"
  },
  {
    nama: "Dr. Said Kelana Asnawi, S.E., M.M.",
    prodi: "Manajemen",
    gsName: "SAID KELANA",
    gsUser: "rd64lNgAAAAJ",
    keahlian: "Manajemen Keuangan Korporat & Pasar Modal"
  },
  {
    nama: "Salam Fadillah Alzah, SST., M.A.",
    prodi: "Administrasi Bisnis",
    gsName: "SALAM FADILLAH ALZAH",
    gsUser: "5Tm1j-oAAAAJ",
    keahlian: "Sosiologi Bisnis & Manajemen Publik"
  },
  {
    nama: "Sigit Birowo, S.Kom., M.Kom.",
    prodi: "Teknik Informatika",
    gsName: "SIGIT BIROWO",
    gsUser: "LKfDRQcAAAAJ",
    keahlian: "Keamanan Jaringan & Sistem Operasi"
  },
  {
    nama: "Siti Meisyaroh, S.Sos., M.Soc.Sc.",
    prodi: "Ilmu Komunikasi",
    gsName: "SITI MEISYAROH",
    gsUser: "XDB1pbgAAAAJ",
    keahlian: "Sosiologi Komunikasi & Hubungan Internasional"
  },
  {
    nama: "Sugi Suhartono, S.E., M.Ak.",
    prodi: "Akuntansi",
    gsName: "SUGI SUHARTONO",
    gsUser: "EZ0wTBoAAAAJ",
    keahlian: "Akuntansi Manajemen & Sistem Informasi Akuntansi"
  },
  {
    nama: "Dr. Sylvia Sari Rosalina, S.Sos., M.Si.",
    prodi: "Administrasi Bisnis",
    gsName: "SYLVIA SARI ROSALINA",
    gsUser: "PcBB_KgAAAAJ",
    keahlian: "Perilaku Organisasi & Administrasi Publik"
  },
  {
    nama: "Ir. Tumpal Janji Raja Sitinjak, M.M.",
    prodi: "Manajemen",
    gsName: "TUMPAL JANJI RAJA SITINJAK",
    gsUser: "oIwDLOsAAAAJ",
    keahlian: "Riset Pasar & Analisis Multivariat"
  },
  {
    nama: "Drs. Wiwin Prastio, M.M.",
    prodi: "Manajemen",
    gsName: "WIWIN PRASTIO",
    gsUser: "ApfR-ogAAAAJ",
    keahlian: "Perilaku Organisasi & Manajemen Bisnis"
  },
  {
    nama: "Yosaphat Danis Murtiharso, S.Sn., M.Sn.",
    prodi: "Ilmu Komunikasi",
    gsName: "YOSAPHAT DANIS MURTIHARSO",
    gsUser: "DAOe_5QAAAAJ",
    keahlian: "Desain Komunikasi Visual & Produksi Media"
  },
  {
    nama: "Dra. Yustina Triyani, M.M., M.Ak.",
    prodi: "Akuntansi",
    gsName: "YUSTINA TRIYANI",
    gsUser: "O4mYkHIAAAAJ",
    keahlian: "Akuntansi Biaya & Akuntansi Sosial Ekonomi"
  },
  {
    nama: "Dr. Zulfikar Ikhsan Pane, S.E., M.Si., CA.",
    prodi: "Akuntansi",
    gsName: "ZULFIKAR IKHSAN PANE",
    gsUser: "xYx_qSsAAAAJ",
    keahlian: "Akuntansi Sektor Publik & Auditing"
  },
  {
    nama: "Joko Susilo, S.Kom, M.Kom, M.M.",
    prodi: "Sistem Informasi",
    gsName: "JOKO SUSILO",
    gsUser: "dZ5sEPAAAAAJ",
    keahlian: "Pemrograman Web & Sistem Informasi Geografis"
  },
  {
    nama: "Bonnie Mindosa, S.E., M. BA.",
    prodi: "Manajemen",
    gsName: "BONNIE MINDOSA",
    gsUser: "PWl277cAAAAJ",
    keahlian: "Manajemen Bisnis Internasional & Pemasaran"
  },
  {
    nama: "Risky Danie Fahrulloh, S.A.B., M.BA.",
    prodi: "Ilmu Komunikasi",
    gsName: "RISKY DANIE FAHRULLOH",
    gsUser: null,
    keahlian: "Komunikasi Korporat & Manajemen Event"
  },
  {
    nama: "Ir. Tundo, S.Kom, M.Kom.",
    prodi: "Sistem Informasi",
    gsName: "TUNDO",
    gsUser: "0Y5v3kcAAAAJ",
    keahlian: "Jaringan Komputer & Sistem Keamanan TI"
  },
  {
    nama: "Dr. Ronnie Togar Mulia Sirait, S.E.,M.M.",
    prodi: "Manajemen",
    gsName: "RONNIE TOGAR MULIA SIRAIT",
    gsUser: "reM4N08AAAAJ",
    keahlian: "Manajemen Strategik & Kewirausahaan"
  }
];
