import React, { useState } from "react";
import { Search, Menu, ChevronRight, User, BookOpen, Calendar, Trophy, Image as ImageIcon, MapPin, Phone, Mail } from "lucide-react";
import { Button } from "../../ui/button";
import { Input } from "../../ui/input";
import { Card, CardContent, CardFooter, CardHeader, CardTitle } from "../../ui/card";
import { Badge } from "../../ui/badge";

export function BoldColorful() {
  const [isMenuOpen, setIsMenuOpen] = useState(false);

  return (
    <div className="min-h-screen bg-neutral-50 font-sans text-neutral-900">
      {/* Top Bar */}
      <div className="bg-[#2E7D32] text-white text-sm py-2 px-4 md:px-8 flex justify-between items-center">
        <div className="flex items-center gap-4">
          <span className="flex items-center gap-1"><Phone size={14} /> 061-9631740</span>
          <span className="hidden md:flex items-center gap-1"><Mail size={14} /> info@smpn2binjai.sch.id</span>
        </div>
        <div className="flex gap-4">
          <a href="#" className="hover:text-amber-300 transition-colors">Portal Siswa</a>
          <a href="#" className="hover:text-amber-300 transition-colors">Portal Guru</a>
        </div>
      </div>

      {/* Header / Navbar */}
      <header className="bg-white shadow-md sticky top-0 z-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex justify-between items-center h-20">
            {/* Logo area */}
            <div className="flex items-center gap-3">
              <div className="text-4xl">🏫</div>
              <div className="flex flex-col">
                <span className="font-extrabold text-2xl tracking-tight text-[#2E7D32] uppercase leading-none">SMPN 2 Binjai</span>
                <span className="text-xs font-semibold text-neutral-500 uppercase tracking-widest hidden sm:block">Unggul, Berkarakter & Berprestasi</span>
              </div>
            </div>

            {/* Desktop Nav */}
            <nav className="hidden lg:flex space-x-1 lg:space-x-2">
              {['Home', 'Profil', 'Berita', 'Informasi', 'Warga Sekolah', 'Galeri', 'Buku Tamu', 'PSB'].map((item) => (
                <a key={item} href="#" className="px-3 py-2 rounded-md text-sm font-bold text-neutral-700 hover:text-[#2E7D32] hover:bg-green-50 transition-all uppercase tracking-wide">
                  {item}
                </a>
              ))}
            </nav>

            {/* Search */}
            <div className="hidden md:flex items-center">
              <div className="relative">
                <input
                  type="text"
                  placeholder="Cari..."
                  className="w-48 pl-4 pr-10 py-2 border-2 border-green-100 rounded-full text-sm focus:outline-none focus:border-[#2E7D32] focus:ring-1 focus:ring-[#2E7D32] transition-all bg-neutral-50 focus:bg-white"
                />
                <Search className="absolute right-3 top-2.5 text-neutral-400" size={16} />
              </div>
            </div>

            {/* Mobile menu button */}
            <div className="lg:hidden flex items-center">
              <button onClick={() => setIsMenuOpen(!isMenuOpen)} className="text-neutral-500 hover:text-[#2E7D32]">
                <Menu size={28} />
              </button>
            </div>
          </div>
        </div>

        {/* Mobile Nav */}
        {isMenuOpen && (
          <div className="lg:hidden bg-white border-t border-neutral-100 px-2 pt-2 pb-3 space-y-1 shadow-lg">
            {['Home', 'Profil', 'Berita', 'Informasi', 'Warga Sekolah', 'Galeri', 'Buku Tamu', 'PSB'].map((item) => (
              <a key={item} href="#" className="block px-3 py-2 rounded-md text-base font-bold text-neutral-700 hover:text-white hover:bg-[#2E7D32]">
                {item}
              </a>
            ))}
          </div>
        )}
      </header>

      {/* Hero / Banner */}
      <div className="relative bg-gradient-to-br from-[#2E7D32] via-[#43A047] to-[#1B5E20] overflow-hidden">
        {/* Decorative elements */}
        <div className="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full blur-3xl transform translate-x-1/2 -translate-y-1/2"></div>
        <div className="absolute bottom-0 left-0 w-96 h-96 bg-[#FF6F00] opacity-10 rounded-full blur-3xl transform -translate-x-1/3 translate-y-1/3"></div>
        <div className="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10 mix-blend-overlay"></div>
        
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32 relative z-10 flex flex-col md:flex-row items-center">
          <div className="md:w-3/5 text-center md:text-left text-white">
            <Badge className="bg-[#FF6F00] hover:bg-[#E65100] text-white border-none mb-6 text-sm font-bold py-1.5 px-4 tracking-widest uppercase">
              Tahun Ajaran 2024/2025
            </Badge>
            <h1 className="text-5xl md:text-6xl lg:text-7xl font-black mb-6 leading-tight tracking-tight drop-shadow-md">
              Membentuk <span className="text-[#FFB300]">Generasi</span><br />
              Pemimpin Masa Depan
            </h1>
            <p className="text-lg md:text-xl text-green-50 mb-10 max-w-2xl font-medium leading-relaxed">
              Selamat datang di website resmi SMP Negeri 2 Binjai. Kami berkomitmen memberikan pendidikan berkualitas untuk mencetak siswa yang unggul, berkarakter, dan berprestasi.
            </p>
            <div className="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
              <Button size="lg" className="bg-[#FF6F00] hover:bg-[#E65100] text-white border-none text-lg font-bold py-6 px-8 rounded-full shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all">
                Penerimaan Siswa Baru
              </Button>
              <Button size="lg" variant="outline" className="bg-transparent border-2 border-white text-white hover:bg-white hover:text-[#2E7D32] text-lg font-bold py-6 px-8 rounded-full transition-all">
                Jelajahi Profil
              </Button>
            </div>
          </div>
          <div className="md:w-2/5 mt-12 md:mt-0 hidden md:block">
             <div className="relative w-full h-[400px]">
               <div className="absolute inset-0 bg-gradient-to-tr from-[#FFB300] to-[#FF6F00] rounded-2xl transform rotate-3 scale-105 opacity-80 shadow-2xl"></div>
               <div className="absolute inset-0 bg-white rounded-2xl overflow-hidden shadow-2xl border-4 border-white flex items-center justify-center relative">
                 <div className="absolute inset-0 bg-gradient-to-br from-neutral-200 to-neutral-300"></div>
                 <ImageIcon className="text-neutral-400 w-24 h-24 relative z-10" />
                 <span className="absolute bottom-4 left-4 text-white font-bold text-sm bg-black/50 px-3 py-1 rounded backdrop-blur-sm">Kegiatan Belajar Mengajar</span>
               </div>
             </div>
          </div>
        </div>
      </div>

      {/* Stats Row */}
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 relative z-20">
        <div className="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
          {[
            { icon: <User size={32} />, value: "850+", label: "Siswa Aktif", color: "bg-blue-500" },
            { icon: <BookOpen size={32} />, value: "45+", label: "Guru Profesional", color: "bg-[#2E7D32]" },
            { icon: <Menu size={32} />, value: "24", label: "Ruang Kelas", color: "bg-[#FF6F00]" },
            { icon: <Trophy size={32} />, value: "120+", label: "Prestasi Diraih", color: "bg-purple-600" },
          ].map((stat, i) => (
            <Card key={i} className="border-none shadow-xl hover:-translate-y-2 transition-transform duration-300 overflow-hidden group">
              <div className={`h-2 ${stat.color} w-full`}></div>
              <CardContent className="p-6 text-center">
                <div className={`mx-auto w-16 h-16 rounded-full flex items-center justify-center mb-4 text-white ${stat.color} shadow-lg group-hover:scale-110 transition-transform`}>
                  {stat.icon}
                </div>
                <div className="text-3xl md:text-4xl font-black text-neutral-800 mb-1">{stat.value}</div>
                <div className="text-sm font-bold text-neutral-500 uppercase tracking-wide">{stat.label}</div>
              </CardContent>
            </Card>
          ))}
        </div>
      </div>

      {/* Main Content Area */}
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div className="flex flex-col lg:flex-row gap-10">
          
          {/* Left Column (2/3) - News & Updates */}
          <div className="lg:w-2/3">
            <div className="flex justify-between items-end mb-8 border-b-4 border-neutral-100 pb-4">
              <div>
                <h2 className="text-3xl font-black text-neutral-800 uppercase tracking-tight">Berita <span className="text-[#FF6F00]">Terkini</span></h2>
                <p className="text-neutral-500 font-medium mt-1">Informasi terbaru seputar kegiatan sekolah</p>
              </div>
              <Button variant="ghost" className="text-[#2E7D32] hover:bg-green-50 font-bold hidden sm:flex">
                Lihat Semua Berita <ChevronRight size={16} className="ml-1" />
              </Button>
            </div>

            <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
              {/* Featured News (Full Width) */}
              <Card className="col-span-1 md:col-span-2 border-0 shadow-lg overflow-hidden group">
                <div className="relative h-64 md:h-80 w-full overflow-hidden">
                  <div className="absolute inset-0 bg-gradient-to-br from-neutral-200 to-neutral-400 group-hover:scale-105 transition-transform duration-500"></div>
                  <div className="absolute inset-0 flex items-center justify-center">
                    <ImageIcon className="text-neutral-500 w-16 h-16" />
                  </div>
                  <div className="absolute top-4 left-4 z-10 flex gap-2">
                    <Badge className="bg-[#2E7D32] hover:bg-[#1B5E20] text-white font-bold text-xs uppercase tracking-wide px-3 py-1">Prestasi</Badge>
                  </div>
                </div>
                <CardContent className="p-8">
                  <div className="flex items-center gap-4 text-sm text-neutral-500 font-semibold mb-3">
                    <span className="flex items-center gap-1"><Calendar size={14} className="text-[#FF6F00]" /> 12 Okt 2024</span>
                    <span className="flex items-center gap-1"><User size={14} className="text-[#FF6F00]" /> Admin</span>
                  </div>
                  <h3 className="text-2xl font-black text-neutral-800 mb-3 group-hover:text-[#2E7D32] transition-colors leading-tight">
                    Tim Cerdas Cermat SMPN 2 Binjai Meraih Juara 1 Tingkat Provinsi
                  </h3>
                  <p className="text-neutral-600 mb-6 leading-relaxed">
                    Prestasi membanggakan kembali ditorehkan oleh siswa-siswi SMP Negeri 2 Binjai. Dalam ajang Olimpiade Sains Nasional tingkat Provinsi yang diselenggarakan akhir pekan lalu...
                  </p>
                  <Button className="bg-transparent border-2 border-[#2E7D32] text-[#2E7D32] hover:bg-[#2E7D32] hover:text-white font-bold rounded-full px-6 transition-colors">
                    Baca Selengkapnya
                  </Button>
                </CardContent>
              </Card>

              {/* Smaller News Cards */}
              {[
                { title: "Peringatan Hari Pendidikan Nasional 2024 Berlangsung Khidmat", date: "02 Mei 2024", cat: "Kegiatan", color: "bg-blue-500" },
                { title: "Jadwal Ujian Akhir Semester Genap Tahun Ajaran 2023/2024", date: "28 Apr 2024", cat: "Akademik", color: "bg-[#FF6F00]" }
              ].map((news, i) => (
                <Card key={i} className="border-0 shadow-lg overflow-hidden group flex flex-col">
                  <div className="relative h-48 w-full overflow-hidden">
                    <div className="absolute inset-0 bg-gradient-to-br from-neutral-200 to-neutral-300 group-hover:scale-105 transition-transform duration-500"></div>
                    <div className="absolute inset-0 flex items-center justify-center">
                      <ImageIcon className="text-neutral-400 w-12 h-12" />
                    </div>
                    <div className="absolute top-4 left-4 z-10">
                      <Badge className={`${news.color} text-white font-bold text-xs uppercase tracking-wide px-3 py-1 border-none`}>{news.cat}</Badge>
                    </div>
                  </div>
                  <CardContent className="p-6 flex-grow flex flex-col">
                    <div className="flex items-center gap-4 text-xs text-neutral-500 font-semibold mb-2">
                      <span className="flex items-center gap-1"><Calendar size={14} /> {news.date}</span>
                    </div>
                    <h3 className="text-lg font-black text-neutral-800 mb-3 group-hover:text-[#2E7D32] transition-colors leading-tight">
                      {news.title}
                    </h3>
                    <p className="text-neutral-600 text-sm mb-4 line-clamp-2">
                      Informasi penting mengenai kegiatan sekolah yang perlu diketahui oleh seluruh warga sekolah.
                    </p>
                    <div className="mt-auto">
                      <a href="#" className="inline-flex items-center text-[#FF6F00] font-bold text-sm hover:underline">
                        Baca <ChevronRight size={16} />
                      </a>
                    </div>
                  </CardContent>
                </Card>
              ))}
            </div>
          </div>

          {/* Right Column (1/3) - Sidebar */}
          <div className="lg:w-1/3 space-y-8">
            
            {/* E-Learning Login */}
            <Card className="border-t-4 border-t-[#FF6F00] shadow-xl relative overflow-hidden">
              <div className="absolute top-0 right-0 p-4 opacity-10">
                <BookOpen size={100} />
              </div>
              <CardHeader className="pb-2 relative z-10">
                <CardTitle className="text-xl font-black uppercase text-neutral-800 flex items-center gap-2">
                  <User className="text-[#FF6F00]" /> E-Learning Login
                </CardTitle>
              </CardHeader>
              <CardContent className="relative z-10">
                <form className="space-y-4">
                  <div className="space-y-2">
                    <label className="text-xs font-bold uppercase text-neutral-500 tracking-wider">Username / NIS</label>
                    <Input className="bg-neutral-50 border-neutral-200 focus:border-[#FF6F00] focus:ring-[#FF6F00]" placeholder="Masukkan NIS" />
                  </div>
                  <div className="space-y-2">
                    <label className="text-xs font-bold uppercase text-neutral-500 tracking-wider">Password</label>
                    <Input type="password" className="bg-neutral-50 border-neutral-200 focus:border-[#FF6F00] focus:ring-[#FF6F00]" placeholder="••••••••" />
                  </div>
                  <Button className="w-full bg-[#FF6F00] hover:bg-[#E65100] text-white font-bold text-base py-5 rounded-lg shadow-md transition-colors mt-2">
                    Masuk Portal
                  </Button>
                </form>
              </CardContent>
            </Card>

            {/* Polling Widget */}
            <Card className="border-none shadow-lg bg-[#2E7D32] text-white overflow-hidden relative">
               <div className="absolute -right-8 -top-8 bg-white/10 w-32 h-32 rounded-full blur-2xl"></div>
               <div className="absolute -left-8 -bottom-8 bg-black/10 w-32 h-32 rounded-full blur-xl"></div>
               
              <CardHeader className="pb-2 relative z-10">
                <CardTitle className="text-lg font-black uppercase tracking-wide flex items-center gap-2 text-white">
                  <Trophy size={20} className="text-amber-300" /> Jajak Pendapat
                </CardTitle>
              </CardHeader>
              <CardContent className="relative z-10">
                <p className="font-medium mb-4 text-green-50">Bagaimana menurut Anda tentang fasilitas di SMPN 2 Binjai?</p>
                <div className="space-y-3">
                  {['Sangat Baik', 'Baik', 'Cukup', 'Kurang'].map((option, i) => (
                    <label key={i} className="flex items-center space-x-3 p-3 bg-white/10 rounded-lg hover:bg-white/20 cursor-pointer transition-colors border border-white/5">
                      <input type="radio" name="polling" className="w-4 h-4 text-amber-500 focus:ring-amber-500 bg-white/20 border-transparent" />
                      <span className="font-bold">{option}</span>
                    </label>
                  ))}
                </div>
                <Button className="w-full mt-5 bg-white text-[#2E7D32] hover:bg-green-50 font-black shadow-md rounded-lg">
                  Kirim Suara
                </Button>
              </CardContent>
            </Card>

            {/* Info Singkat */}
            <Card className="border-l-4 border-l-blue-500 shadow-md">
               <CardHeader className="py-4">
                 <CardTitle className="text-lg font-black uppercase tracking-tight text-neutral-800">
                   Pengumuman
                 </CardTitle>
               </CardHeader>
               <CardContent className="space-y-4">
                  <div className="border-b border-neutral-100 pb-3">
                    <Badge variant="outline" className="mb-2 text-blue-600 border-blue-200 bg-blue-50">INFO PSB</Badge>
                    <h4 className="font-bold text-neutral-800 leading-tight hover:text-blue-600 cursor-pointer transition-colors">Pendaftaran Peserta Didik Baru Gelombang 2</h4>
                    <p className="text-xs text-neutral-500 mt-1 font-medium">Berakhir pada: 15 Juni 2024</p>
                  </div>
                  <div className="">
                    <Badge variant="outline" className="mb-2 text-red-600 border-red-200 bg-red-50">PENTING</Badge>
                    <h4 className="font-bold text-neutral-800 leading-tight hover:text-red-600 cursor-pointer transition-colors">Pengambilan Raport Semester Ganjil</h4>
                    <p className="text-xs text-neutral-500 mt-1 font-medium">Jumat, 20 Desember 2023</p>
                  </div>
               </CardContent>
            </Card>

          </div>
        </div>
      </div>

      {/* Footer */}
      <footer className="bg-neutral-900 text-neutral-300 pt-16 pb-8 border-t-8 border-[#FF6F00]">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
            
            {/* School Info */}
            <div className="col-span-1 md:col-span-2 lg:col-span-1">
              <div className="flex items-center gap-2 mb-6">
                <div className="text-3xl">🏫</div>
                <div className="flex flex-col">
                  <span className="font-black text-xl tracking-tight text-white uppercase leading-none">SMPN 2 Binjai</span>
                </div>
              </div>
              <p className="text-neutral-400 mb-6 font-medium leading-relaxed">
                Sekolah Menengah Pertama Negeri 2 Binjai. Membangun generasi unggul, berkarakter, dan berprestasi di tingkat nasional maupun internasional.
              </p>
              <div className="flex space-x-4">
                 <div className="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#FF6F00] hover:text-white cursor-pointer transition-colors">
                   <span className="font-bold text-lg">f</span>
                 </div>
                 <div className="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#FF6F00] hover:text-white cursor-pointer transition-colors">
                   <span className="font-bold text-lg">ig</span>
                 </div>
                 <div className="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-[#FF6F00] hover:text-white cursor-pointer transition-colors">
                   <span className="font-bold text-lg">yt</span>
                 </div>
              </div>
            </div>

            {/* Quick Links */}
            <div>
              <h3 className="text-white font-black uppercase tracking-wider mb-6 flex items-center gap-2">
                <span className="w-3 h-3 bg-[#2E7D32] inline-block"></span> Tautan Cepat
              </h3>
              <ul className="space-y-3 font-medium">
                {['Profil Sekolah', 'Visi & Misi', 'Struktur Organisasi', 'Fasilitas Sekolah', 'Prestasi Siswa', 'Kontak Kami'].map((link, i) => (
                  <li key={i}>
                    <a href="#" className="hover:text-white hover:translate-x-2 inline-block transition-all flex items-center gap-2">
                      <ChevronRight size={14} className="text-[#FF6F00]" /> {link}
                    </a>
                  </li>
                ))}
              </ul>
            </div>

            {/* Academic */}
            <div>
              <h3 className="text-white font-black uppercase tracking-wider mb-6 flex items-center gap-2">
                <span className="w-3 h-3 bg-[#FF6F00] inline-block"></span> Akademik
              </h3>
              <ul className="space-y-3 font-medium">
                {['Portal E-Learning', 'Informasi PPDB', 'Jadwal Pelajaran', 'Kalender Akademik', 'Perpustakaan Digital', 'Alumni'].map((link, i) => (
                  <li key={i}>
                    <a href="#" className="hover:text-white hover:translate-x-2 inline-block transition-all flex items-center gap-2">
                      <ChevronRight size={14} className="text-[#2E7D32]" /> {link}
                    </a>
                  </li>
                ))}
              </ul>
            </div>

            {/* Contact */}
            <div>
              <h3 className="text-white font-black uppercase tracking-wider mb-6 flex items-center gap-2">
                <span className="w-3 h-3 bg-blue-500 inline-block"></span> Hubungi Kami
              </h3>
              <ul className="space-y-4 font-medium">
                <li className="flex items-start gap-3">
                  <MapPin size={20} className="text-neutral-500 mt-1 flex-shrink-0" />
                  <span>Jl. Sultan Hasanuddin No.12, Kota Binjai, Sumatera Utara 20714</span>
                </li>
                <li className="flex items-center gap-3">
                  <Phone size={18} className="text-neutral-500 flex-shrink-0" />
                  <span>061-9631740</span>
                </li>
                <li className="flex items-center gap-3">
                  <Mail size={18} className="text-neutral-500 flex-shrink-0" />
                  <span>info@smpn2binjai.sch.id</span>
                </li>
              </ul>
            </div>

          </div>
          
          <div className="border-t border-neutral-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-sm font-medium">
            <p>&copy; {new Date().getFullYear()} SMP Negeri 2 Binjai. Hak Cipta Dilindungi.</p>
            <div className="flex gap-4">
              <a href="#" className="hover:text-white transition-colors">Kebijakan Privasi</a>
              <a href="#" className="hover:text-white transition-colors">Syarat & Ketentuan</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  );
}
