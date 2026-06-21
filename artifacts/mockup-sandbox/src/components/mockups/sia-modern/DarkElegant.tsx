import React from "react";
import { 
  Phone, Mail, MapPin, ChevronRight, Menu, 
  GraduationCap, BookOpen, Trophy, Users,
  ChevronDown, Search, ArrowRight, User
} from "lucide-react";

export function DarkElegant() {
  return (
    <div className="min-h-screen bg-[#0D1B2A] text-slate-200 font-sans selection:bg-[#C9A84C] selection:text-[#0D1B2A] overflow-x-hidden">
      <style>
        {`
          @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap');
          
          .font-serif {
            font-family: 'Playfair Display', serif;
          }
          .font-sans {
            font-family: 'Inter', sans-serif;
          }
          
          .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(201, 168, 76, 0.15);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
          }
          
          .glass-card:hover {
            border-color: rgba(201, 168, 76, 0.4);
            background: rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
          }
        `}
      </style>

      {/* Top Bar */}
      <div className="w-full bg-black/40 border-b border-[#C9A84C]/20 text-sm py-2">
        <div className="container mx-auto px-6 flex justify-between items-center">
          <div className="flex items-center space-x-6 text-slate-400">
            <span className="flex items-center hover:text-[#C9A84C] transition-colors"><Phone className="w-4 h-4 mr-2 text-[#C9A84C]" /> 061-9631740</span>
            <span className="flex items-center hover:text-[#C9A84C] transition-colors hidden sm:flex"><Mail className="w-4 h-4 mr-2 text-[#C9A84C]" /> info@smpn2binjai.sch.id</span>
          </div>
          <div className="flex items-center space-x-4">
            <div className="relative">
              <input 
                type="text" 
                placeholder="Cari..." 
                className="bg-white/5 border border-white/10 rounded-full py-1 px-4 pl-8 text-xs focus:outline-none focus:border-[#C9A84C]/50 text-white w-48 transition-all"
              />
              <Search className="w-3 h-3 absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" />
            </div>
          </div>
        </div>
      </div>

      {/* Header / Navbar */}
      <header className="sticky top-0 z-50 bg-[#0D1B2A]/90 backdrop-blur-md border-b border-[#C9A84C]/20 transition-all duration-300">
        <div className="container mx-auto px-6 py-4 flex items-center justify-between">
          <div className="flex items-center gap-4">
            <div className="w-12 h-12 bg-gradient-to-br from-[#C9A84C] to-[#8A7130] rounded-full flex items-center justify-center text-2xl shadow-[0_0_15px_rgba(201,168,76,0.3)]">
              🏫
            </div>
            <div>
              <h1 className="font-serif text-2xl font-bold text-white tracking-wide">SMPN 2 BINJAI</h1>
              <p className="text-[#C9A84C] text-xs tracking-widest uppercase mt-0.5">Membangun Generasi Unggul</p>
            </div>
          </div>

          <nav className="hidden lg:flex items-center gap-8">
            {['Home', 'Profil', 'Berita', 'Informasi', 'Warga Sekolah', 'Galeri', 'Buku Tamu'].map((item) => (
              <a key={item} href="#" className="text-sm font-medium text-slate-200 hover:text-[#C9A84C] relative group py-2">
                {item}
                <span className="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#C9A84C] transition-all duration-300 group-hover:w-full"></span>
              </a>
            ))}
            <a href="#" className="bg-gradient-to-r from-[#C9A84C] to-[#8A7130] text-[#0D1B2A] px-5 py-2 rounded-sm font-semibold text-sm hover:shadow-[0_0_15px_rgba(201,168,76,0.4)] transition-all flex items-center gap-2">
              PSB Online
            </a>
          </nav>

          <button className="lg:hidden text-white">
            <Menu className="w-6 h-6" />
          </button>
        </div>
      </header>

      {/* Hero / Banner */}
      <section className="relative pt-24 pb-32 overflow-hidden border-b border-[#C9A84C]/10">
        <div className="absolute inset-0 z-0">
          <div className="absolute inset-0 bg-gradient-to-br from-[#0D1B2A] via-[#102336] to-[#0A131E] opacity-90 z-10" />
          <div className="w-full h-full bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-[#C9A84C]/10 via-transparent to-transparent opacity-50 z-0" />
          {/* Decorative geometric elements */}
          <div className="absolute top-20 right-20 w-96 h-96 border border-[#C9A84C]/10 rounded-full opacity-20 blur-sm" />
          <div className="absolute bottom-10 left-10 w-64 h-64 border border-[#C9A84C]/10 rounded-full opacity-20 blur-sm" />
        </div>

        <div className="container mx-auto px-6 relative z-20">
          <div className="max-w-3xl">
            <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-[#C9A84C]/30 bg-[#C9A84C]/10 text-[#C9A84C] text-xs font-medium tracking-widest mb-6">
              <span className="w-2 h-2 rounded-full bg-[#C9A84C] animate-pulse" />
              PENDAFTARAN SISWA BARU 2024/2025 DIBUKA
            </div>
            <h2 className="font-serif text-5xl md:text-6xl lg:text-7xl font-bold text-white leading-tight mb-6">
              Membentuk <span className="text-transparent bg-clip-text bg-gradient-to-r from-[#C9A84C] to-[#E3C986]">Karakter</span> & <br/>Prestasi Gemilang.
            </h2>
            <p className="text-lg md:text-xl text-slate-300 mb-10 max-w-2xl leading-relaxed font-light">
              Selamat datang di website resmi SMP Negeri 2 Binjai. Kami berkomitmen memberikan pendidikan berkualitas untuk mempersiapkan generasi pemimpin masa depan.
            </p>
            <div className="flex flex-wrap gap-4">
              <a href="#" className="bg-[#C9A84C] text-[#0D1B2A] px-8 py-4 rounded-sm font-semibold hover:bg-white transition-all flex items-center gap-2 group">
                Jelajahi Profil <ArrowRight className="w-4 h-4 group-hover:translate-x-1 transition-transform" />
              </a>
              <a href="#" className="border border-[#C9A84C]/50 text-white px-8 py-4 rounded-sm font-medium hover:bg-[#C9A84C]/10 transition-all">
                Hubungi Kami
              </a>
            </div>
          </div>
        </div>
      </section>

      {/* Main Content Area */}
      <section className="py-20 relative z-20">
        <div className="container mx-auto px-6">
          <div className="flex flex-col lg:flex-row gap-12">
            
            {/* Left Column (2/3) - News & Updates */}
            <div className="lg:w-2/3">
              <div className="flex items-center justify-between mb-10 border-b border-white/10 pb-4">
                <h3 className="font-serif text-3xl font-bold text-white flex items-center gap-3">
                  <span className="w-1.5 h-8 bg-[#C9A84C] inline-block rounded-full"></span>
                  Berita Terkini
                </h3>
                <a href="#" className="text-[#C9A84C] hover:text-white transition-colors text-sm font-medium flex items-center gap-1">
                  Lihat Semua <ChevronRight className="w-4 h-4" />
                </a>
              </div>

              <div className="grid md:grid-cols-2 gap-6">
                {[
                  {
                    title: "Prestasi Gemilang Tim Olimpiade Sains Nasional SMPN 2 Binjai",
                    date: "12 Okt 2023",
                    category: "Prestasi",
                    excerpt: "Siswa-siswi SMPN 2 Binjai kembali menorehkan prestasi membanggakan di tingkat nasional dengan meraih medali emas."
                  },
                  {
                    title: "Pelaksanaan Asesmen Nasional Berbasis Komputer (ANBK) 2023",
                    date: "05 Okt 2023",
                    category: "Akademik",
                    excerpt: "Pelaksanaan ANBK tahun ini berjalan lancar dengan fasilitas laboratorium komputer baru yang telah diresmikan."
                  },
                  {
                    title: "Kunjungan Studi Banding dari Dinas Pendidikan Provinsi",
                    date: "28 Sep 2023",
                    category: "Informasi",
                    excerpt: "SMPN 2 Binjai menerima kunjungan kehormatan untuk berbagi praktik baik dalam manajemen sekolah berbasis digital."
                  },
                  {
                    title: "Pengumuman Jadwal Ujian Tengah Semester Ganjil",
                    date: "15 Sep 2023",
                    category: "Akademik",
                    excerpt: "Diberitahukan kepada seluruh siswa kelas VII, VIII, dan IX mengenai jadwal lengkap Ujian Tengah Semester."
                  }
                ].map((news, i) => (
                  <div key={i} className="glass-card rounded-lg overflow-hidden group flex flex-col h-full">
                    <div className="h-48 bg-gradient-to-br from-[#1A2E44] to-[#0D1B2A] relative overflow-hidden">
                      {/* Placeholder for image */}
                      <div className="absolute inset-0 opacity-20 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-white/20 to-transparent"></div>
                      <div className="absolute top-4 left-4 bg-[#C9A84C] text-[#0D1B2A] text-xs font-bold px-3 py-1 rounded-sm">
                        {news.category}
                      </div>
                    </div>
                    <div className="p-6 flex-grow flex flex-col justify-between">
                      <div>
                        <div className="text-slate-400 text-xs mb-3 font-medium tracking-wide">{news.date}</div>
                        <h4 className="font-serif text-xl font-bold text-white mb-3 group-hover:text-[#C9A84C] transition-colors leading-tight">
                          {news.title}
                        </h4>
                        <p className="text-slate-400 text-sm line-clamp-3 leading-relaxed">
                          {news.excerpt}
                        </p>
                      </div>
                      <div className="mt-6 pt-4 border-t border-white/5">
                        <a href="#" className="text-[#C9A84C] text-sm font-medium flex items-center hover:text-white transition-colors">
                          Baca Selengkapnya <ArrowRight className="w-4 h-4 ml-2" />
                        </a>
                      </div>
                    </div>
                  </div>
                ))}
              </div>
            </div>

            {/* Right Column (1/3) - Sidebar */}
            <div className="lg:w-1/3 space-y-8">
              
              {/* Login E-Learning Widget */}
              <div className="glass-card p-8 rounded-lg relative overflow-hidden">
                <div className="absolute top-0 right-0 w-32 h-32 bg-[#C9A84C]/5 rounded-full blur-2xl -mr-10 -mt-10" />
                <h3 className="font-serif text-2xl font-bold text-white mb-2 relative z-10">Portal E-Learning</h3>
                <p className="text-slate-400 text-sm mb-6 relative z-10">Akses materi dan tugas untuk siswa.</p>
                
                <form className="space-y-4 relative z-10">
                  <div>
                    <div className="relative">
                      <User className="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" />
                      <input 
                        type="text" 
                        placeholder="NIS / Username" 
                        className="w-full bg-black/20 border border-white/10 rounded-sm py-2.5 px-4 pl-10 text-sm focus:outline-none focus:border-[#C9A84C] text-white transition-all placeholder:text-slate-500"
                      />
                    </div>
                  </div>
                  <div>
                    <div className="relative">
                      <div className="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 flex items-center justify-center">
                        <div className="w-1.5 h-1.5 rounded-full bg-slate-400"></div>
                      </div>
                      <input 
                        type="password" 
                        placeholder="Password" 
                        className="w-full bg-black/20 border border-white/10 rounded-sm py-2.5 px-4 pl-10 text-sm focus:outline-none focus:border-[#C9A84C] text-white transition-all placeholder:text-slate-500"
                      />
                    </div>
                  </div>
                  <div className="flex justify-between items-center text-xs">
                    <label className="flex items-center text-slate-400 cursor-pointer hover:text-white">
                      <input type="checkbox" className="mr-2 accent-[#C9A84C] bg-transparent border-white/20" /> Ingat saya
                    </label>
                    <a href="#" className="text-[#C9A84C] hover:underline">Lupa Password?</a>
                  </div>
                  <button className="w-full bg-[#C9A84C] hover:bg-[#b09341] text-[#0D1B2A] font-bold py-2.5 rounded-sm transition-colors mt-2">
                    Masuk
                  </button>
                </form>
              </div>

              {/* Polling Widget */}
              <div className="glass-card p-8 rounded-lg">
                <h3 className="font-serif text-xl font-bold text-white mb-4 border-b border-white/10 pb-3">Polling Sekolah</h3>
                <p className="text-sm text-slate-300 mb-5">Bagaimana pendapat Anda tentang fasilitas website baru ini?</p>
                <div className="space-y-3">
                  {['Sangat Baik', 'Baik', 'Cukup', 'Kurang'].map((option, i) => (
                    <label key={i} className="flex items-center p-3 border border-white/5 rounded-sm hover:bg-white/5 cursor-pointer transition-colors group">
                      <input type="radio" name="poll" className="mr-3 text-[#C9A84C] bg-transparent border-white/20 focus:ring-[#C9A84C]" />
                      <span className="text-sm text-slate-300 group-hover:text-white">{option}</span>
                    </label>
                  ))}
                  <div className="pt-4 flex gap-3">
                    <button className="flex-1 bg-white/10 hover:bg-white/20 text-white font-medium py-2 rounded-sm transition-colors text-sm border border-white/10">Vote</button>
                    <button className="flex-1 text-slate-400 hover:text-white text-sm transition-colors border border-transparent">Lihat Hasil</button>
                  </div>
                </div>
              </div>

              {/* Contact Info */}
              <div className="glass-card p-8 rounded-lg">
                <h3 className="font-serif text-xl font-bold text-white mb-6 border-b border-white/10 pb-3">Informasi Kontak</h3>
                <ul className="space-y-5">
                  <li className="flex items-start">
                    <div className="w-8 h-8 rounded-full bg-[#C9A84C]/10 flex items-center justify-center shrink-0 mr-4 border border-[#C9A84C]/20">
                      <MapPin className="w-4 h-4 text-[#C9A84C]" />
                    </div>
                    <div>
                      <span className="block text-white font-medium text-sm mb-1">Alamat</span>
                      <span className="text-slate-400 text-sm leading-relaxed">Jl. Pendidikan No. 12, Binjai Kota, Kota Binjai, Sumatera Utara 20714</span>
                    </div>
                  </li>
                  <li className="flex items-start">
                    <div className="w-8 h-8 rounded-full bg-[#C9A84C]/10 flex items-center justify-center shrink-0 mr-4 border border-[#C9A84C]/20">
                      <Phone className="w-4 h-4 text-[#C9A84C]" />
                    </div>
                    <div>
                      <span className="block text-white font-medium text-sm mb-1">Telepon</span>
                      <span className="text-slate-400 text-sm">061-9631740</span>
                    </div>
                  </li>
                  <li className="flex items-start">
                    <div className="w-8 h-8 rounded-full bg-[#C9A84C]/10 flex items-center justify-center shrink-0 mr-4 border border-[#C9A84C]/20">
                      <Mail className="w-4 h-4 text-[#C9A84C]" />
                    </div>
                    <div>
                      <span className="block text-white font-medium text-sm mb-1">Email</span>
                      <span className="text-slate-400 text-sm">info@smpn2binjai.sch.id</span>
                    </div>
                  </li>
                </ul>
              </div>

            </div>
          </div>
        </div>
      </section>

      {/* Achievements / Stats Strip */}
      <section className="py-16 bg-black/30 border-y border-[#C9A84C]/10 relative">
        <div className="absolute inset-0 bg-[linear-gradient(45deg,transparent_25%,rgba(201,168,76,0.03)_50%,transparent_75%,transparent_100%)] bg-[length:20px_20px]" />
        <div className="container mx-auto px-6 relative z-10">
          <div className="grid grid-cols-2 md:grid-cols-4 gap-8 divide-x divide-white/5">
            <div className="text-center px-4">
              <div className="w-12 h-12 mx-auto mb-4 bg-gradient-to-br from-[#C9A84C] to-[#8A7130] rounded-lg flex items-center justify-center shadow-lg transform rotate-3">
                <Users className="w-6 h-6 text-[#0D1B2A]" />
              </div>
              <h4 className="font-serif text-3xl font-bold text-white mb-1">850+</h4>
              <p className="text-slate-400 text-sm uppercase tracking-wider">Siswa Aktif</p>
            </div>
            <div className="text-center px-4">
              <div className="w-12 h-12 mx-auto mb-4 bg-gradient-to-br from-[#C9A84C] to-[#8A7130] rounded-lg flex items-center justify-center shadow-lg transform -rotate-3">
                <GraduationCap className="w-6 h-6 text-[#0D1B2A]" />
              </div>
              <h4 className="font-serif text-3xl font-bold text-white mb-1">65</h4>
              <p className="text-slate-400 text-sm uppercase tracking-wider">Tenaga Pendidik</p>
            </div>
            <div className="text-center px-4">
              <div className="w-12 h-12 mx-auto mb-4 bg-gradient-to-br from-[#C9A84C] to-[#8A7130] rounded-lg flex items-center justify-center shadow-lg transform rotate-3">
                <BookOpen className="w-6 h-6 text-[#0D1B2A]" />
              </div>
              <h4 className="font-serif text-3xl font-bold text-white mb-1">32</h4>
              <p className="text-slate-400 text-sm uppercase tracking-wider">Ruang Kelas</p>
            </div>
            <div className="text-center px-4">
              <div className="w-12 h-12 mx-auto mb-4 bg-gradient-to-br from-[#C9A84C] to-[#8A7130] rounded-lg flex items-center justify-center shadow-lg transform -rotate-3">
                <Trophy className="w-6 h-6 text-[#0D1B2A]" />
              </div>
              <h4 className="font-serif text-3xl font-bold text-white mb-1">124</h4>
              <p className="text-slate-400 text-sm uppercase tracking-wider">Penghargaan</p>
            </div>
          </div>
        </div>
      </section>

      {/* Footer */}
      <footer className="pt-20 pb-10 bg-[#070e17] border-t border-[#C9A84C]/20 relative overflow-hidden">
        <div className="absolute top-0 right-0 w-1/3 h-full bg-[#C9A84C]/5 blur-3xl opacity-50 pointer-events-none" />
        
        <div className="container mx-auto px-6 relative z-10">
          <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            <div className="col-span-1 lg:col-span-1">
              <div className="flex items-center gap-3 mb-6">
                <div className="text-2xl">🏫</div>
                <div>
                  <h2 className="font-serif text-xl font-bold text-white tracking-wide">SMPN 2 BINJAI</h2>
                </div>
              </div>
              <p className="text-slate-400 text-sm leading-relaxed mb-6">
                Membangun generasi bangsa yang unggul, berakhlak mulia, dan berprestasi di tingkat nasional maupun internasional.
              </p>
              <div className="flex space-x-4">
                {/* Social icons placeholders */}
                {[1, 2, 3].map((_, i) => (
                  <a key={i} href="#" className="w-8 h-8 rounded-full border border-white/20 flex items-center justify-center text-slate-400 hover:border-[#C9A84C] hover:text-[#C9A84C] transition-colors">
                    <span className="sr-only">Social Media</span>
                    <div className="w-3 h-3 bg-current opacity-70" style={{ clipPath: 'polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%)' }}/>
                  </a>
                ))}
              </div>
            </div>

            <div>
              <h4 className="font-serif text-lg font-bold text-white mb-6 flex items-center gap-2">
                <span className="w-2 h-2 bg-[#C9A84C] rounded-sm"></span> Tautan Cepat
              </h4>
              <ul className="space-y-3">
                {['Profil Sekolah', 'Visi & Misi', 'Struktur Organisasi', 'Fasilitas', 'Prestasi'].map((link) => (
                  <li key={link}>
                    <a href="#" className="text-slate-400 hover:text-[#C9A84C] text-sm flex items-center transition-colors">
                      <ChevronRight className="w-3 h-3 mr-2 opacity-50" /> {link}
                    </a>
                  </li>
                ))}
              </ul>
            </div>

            <div>
              <h4 className="font-serif text-lg font-bold text-white mb-6 flex items-center gap-2">
                <span className="w-2 h-2 bg-[#C9A84C] rounded-sm"></span> Layanan
              </h4>
              <ul className="space-y-3">
                {['E-Learning', 'Perpustakaan Digital', 'Sistem Informasi Akademik', 'Penerimaan Siswa Baru', 'Alumni'].map((link) => (
                  <li key={link}>
                    <a href="#" className="text-slate-400 hover:text-[#C9A84C] text-sm flex items-center transition-colors">
                      <ChevronRight className="w-3 h-3 mr-2 opacity-50" /> {link}
                    </a>
                  </li>
                ))}
              </ul>
            </div>

            <div>
              <h4 className="font-serif text-lg font-bold text-white mb-6 flex items-center gap-2">
                <span className="w-2 h-2 bg-[#C9A84C] rounded-sm"></span> Newsletter
              </h4>
              <p className="text-slate-400 text-sm mb-4">Dapatkan informasi terbaru seputar kegiatan sekolah langsung ke email Anda.</p>
              <form className="flex flex-col gap-3">
                <input 
                  type="email" 
                  placeholder="Alamat Email" 
                  className="bg-white/5 border border-white/10 py-2 px-4 rounded-sm text-sm text-white focus:outline-none focus:border-[#C9A84C] transition-colors"
                />
                <button className="bg-transparent border border-[#C9A84C] text-[#C9A84C] hover:bg-[#C9A84C] hover:text-[#0D1B2A] py-2 px-4 rounded-sm font-semibold text-sm transition-all">
                  Berlangganan
                </button>
              </form>
            </div>
          </div>

          <div className="pt-8 border-t border-white/10 flex flex-col md:flex-row items-center justify-between gap-4">
            <p className="text-slate-500 text-sm">
              &copy; {new Date().getFullYear()} SMP Negeri 2 Binjai. Hak Cipta Dilindungi.
            </p>
            <div className="flex gap-6 text-sm text-slate-500">
              <a href="#" className="hover:text-white transition-colors">Kebijakan Privasi</a>
              <a href="#" className="hover:text-white transition-colors">Syarat & Ketentuan</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  );
}
