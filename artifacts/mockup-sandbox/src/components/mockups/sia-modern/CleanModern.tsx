import React, { useState } from 'react';
import { 
  Search, Phone, Mail, MapPin, ChevronRight, 
  User, Lock, Calendar, MessageSquare, Menu,
  Clock, ArrowRight
} from 'lucide-react';

export function CleanModern() {
  const [activeTab, setActiveTab] = useState('berita');
  const [isMenuOpen, setIsMenuOpen] = useState(false);

  return (
    <div className="min-h-screen bg-slate-50 font-sans" style={{ fontFamily: "'Inter', sans-serif" }}>
      <style dangerouslySetInnerHTML={{__html: `
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
      `}} />
      
      {/* Top Bar */}
      <div className="bg-[#1565C0] text-white py-2 text-sm">
        <div className="container mx-auto px-4 flex flex-col sm:flex-row justify-between items-center">
          <div className="flex items-center gap-4 mb-2 sm:mb-0">
            <span className="flex items-center gap-2"><Phone size={14} /> 061-9631740</span>
            <span className="flex items-center gap-2"><Mail size={14} /> info@smpn2binjai.sch.id</span>
          </div>
          <div className="flex items-center gap-4">
            <a href="#" className="hover:text-blue-200 transition">E-Learning</a>
            <a href="#" className="hover:text-blue-200 transition">Alumni</a>
            <a href="#" className="hover:text-blue-200 transition">PPDB 2024</a>
          </div>
        </div>
      </div>

      {/* Header */}
      <header className="bg-white shadow-sm sticky top-0 z-50">
        <div className="container mx-auto px-4 py-4">
          <div className="flex justify-between items-center">
            <div className="flex items-center gap-3">
              <div className="text-4xl">🏫</div>
              <div>
                <h1 className="text-2xl font-bold text-slate-800 leading-tight">SMP Negeri 2 Binjai</h1>
                <p className="text-sm text-slate-500 font-medium">Binjai, Sumatera Utara</p>
              </div>
            </div>

            <div className="hidden md:flex items-center gap-4">
              <div className="relative">
                <input 
                  type="text" 
                  placeholder="Cari informasi..." 
                  className="pl-10 pr-4 py-2 border border-slate-200 rounded-full text-sm w-64 focus:outline-none focus:border-[#1565C0] focus:ring-1 focus:ring-[#1565C0] transition"
                />
                <Search size={16} className="absolute left-3 top-2.5 text-slate-400" />
              </div>
            </div>

            <button className="md:hidden text-slate-600" onClick={() => setIsMenuOpen(!isMenuOpen)}>
              <Menu size={24} />
            </button>
          </div>
        </div>

        {/* Navigation */}
        <div className="border-t border-slate-100 hidden md:block">
          <div className="container mx-auto px-4">
            <nav className="flex space-x-1">
              {['Home', 'Profil', 'Berita', 'Informasi', 'Warga Sekolah', 'Galeri', 'Buku Tamu', 'PSB'].map((item) => (
                <a 
                  key={item} 
                  href="#" 
                  className={`px-4 py-3 text-sm font-medium transition ${item === 'Home' ? 'text-[#1565C0] border-b-2 border-[#1565C0]' : 'text-slate-600 hover:text-[#1565C0] hover:bg-slate-50'}`}
                >
                  {item}
                </a>
              ))}
            </nav>
          </div>
        </div>
        
        {/* Mobile Nav */}
        {isMenuOpen && (
          <div className="md:hidden border-t border-slate-100">
            <nav className="flex flex-col py-2">
              {['Home', 'Profil', 'Berita', 'Informasi', 'Warga Sekolah', 'Galeri', 'Buku Tamu', 'PSB'].map((item) => (
                <a key={item} href="#" className="px-4 py-3 text-sm font-medium text-slate-600 hover:bg-slate-50 border-b border-slate-50">
                  {item}
                </a>
              ))}
            </nav>
          </div>
        )}
      </header>

      {/* Hero Section */}
      <section className="bg-gradient-to-r from-[#1565C0] to-[#0D47A1] text-white">
        <div className="container mx-auto px-4 py-16 md:py-24">
          <div className="grid md:grid-cols-2 gap-8 items-center">
            <div className="space-y-6">
              <span className="inline-block py-1 px-3 rounded-full bg-white/20 text-sm font-medium backdrop-blur-sm">
                Selamat Datang di Portal Resmi
              </span>
              <h2 className="text-4xl md:text-5xl font-bold leading-tight">
                Membentuk Generasi Cerdas & Berkarakter
              </h2>
              <p className="text-blue-100 text-lg max-w-lg leading-relaxed">
                Pendidikan berkualitas untuk masa depan yang lebih baik. Kami berkomitmen memberikan pelayanan pendidikan terbaik di Binjai, Sumatera Utara.
              </p>
              <div className="flex gap-4 pt-4">
                <button className="bg-white text-[#1565C0] px-6 py-3 rounded-lg font-semibold shadow-lg hover:shadow-xl transition hover:-translate-y-0.5">
                  Daftar PPDB
                </button>
                <button className="bg-transparent border border-white/30 hover:bg-white/10 text-white px-6 py-3 rounded-lg font-semibold transition">
                  Jelajahi Profil
                </button>
              </div>
            </div>
            <div className="hidden md:block">
              <div className="aspect-[4/3] bg-white/10 rounded-2xl shadow-2xl backdrop-blur-sm border border-white/20 flex items-center justify-center overflow-hidden">
                <div className="w-full h-full bg-slate-200/20 flex items-center justify-center">
                  <div className="text-center text-white/70">
                    <div className="w-16 h-16 border-2 border-white/50 rounded-full flex items-center justify-center mx-auto mb-4">
                      <div className="w-0 h-0 border-t-[10px] border-t-transparent border-l-[15px] border-l-white border-b-[10px] border-b-transparent ml-1"></div>
                    </div>
                    <p className="font-medium">Video Profil Sekolah</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Main Content */}
      <main className="container mx-auto px-4 py-12">
        <div className="grid lg:grid-cols-3 gap-8">
          
          {/* Left Column - Main Content */}
          <div className="lg:col-span-2 space-y-8">
            
            {/* Tabs */}
            <div className="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
              <div className="flex overflow-x-auto border-b border-slate-100 scrollbar-hide">
                {[
                  { id: 'berita', label: 'Berita Terbaru' },
                  { id: 'kategori', label: 'Kategori' },
                  { id: 'komentar', label: 'Komentar' },
                  { id: 'agenda', label: 'Agenda' },
                ].map(tab => (
                  <button
                    key={tab.id}
                    onClick={() => setActiveTab(tab.id)}
                    className={`px-6 py-4 text-sm font-medium whitespace-nowrap transition-colors relative ${
                      activeTab === tab.id 
                        ? 'text-[#1565C0]' 
                        : 'text-slate-500 hover:text-slate-800 bg-slate-50/50 hover:bg-slate-50'
                    }`}
                  >
                    {tab.label}
                    {activeTab === tab.id && (
                      <div className="absolute bottom-0 left-0 right-0 h-0.5 bg-[#1565C0]"></div>
                    )}
                  </button>
                ))}
              </div>

              <div className="p-6">
                {activeTab === 'berita' && (
                  <div className="space-y-6">
                    {[
                      {
                        title: "Prestasi Gemilang Siswa SMPN 2 di Olimpiade Sains Nasional",
                        date: "12 Okt 2023",
                        author: "Admin",
                        excerpt: "Siswa SMPN 2 Binjai kembali menorehkan prestasi membanggakan di tingkat nasional dengan meraih medali perak pada OSN 2023.",
                        color: "bg-blue-100"
                      },
                      {
                        title: "Pelaksanaan Asesmen Nasional Berbasis Komputer (ANBK)",
                        date: "05 Sep 2023",
                        author: "Humas",
                        excerpt: "SMPN 2 Binjai sukses melaksanakan ANBK tahun 2023 dengan tertib dan lancar tanpa kendala teknis yang berarti.",
                        color: "bg-emerald-100"
                      },
                      {
                        title: "Kegiatan Ekstrakurikuler Pramuka Rutin Mingguan",
                        date: "28 Agu 2023",
                        author: "Kesiswaan",
                        excerpt: "Dalam rangka membentuk karakter disiplin, kegiatan pramuka wajib bagi kelas VII kembali digiatkan setiap hari Sabtu sore.",
                        color: "bg-amber-100"
                      }
                    ].map((news, i) => (
                      <article key={i} className="flex flex-col sm:flex-row gap-5 group cursor-pointer">
                        <div className={`w-full sm:w-48 h-32 rounded-lg ${news.color} flex-shrink-0 relative overflow-hidden transition-transform group-hover:scale-[1.02] shadow-sm`}>
                          <div className="absolute inset-0 bg-gradient-to-tr from-black/20 to-transparent mix-blend-overlay"></div>
                        </div>
                        <div className="flex-1 flex flex-col justify-center">
                          <div className="flex items-center gap-3 text-xs text-slate-500 mb-2">
                            <span className="flex items-center gap-1"><Calendar size={12} /> {news.date}</span>
                            <span className="flex items-center gap-1"><User size={12} /> {news.author}</span>
                          </div>
                          <h3 className="text-lg font-bold text-slate-800 mb-2 group-hover:text-[#1565C0] transition-colors leading-tight">
                            {news.title}
                          </h3>
                          <p className="text-sm text-slate-600 line-clamp-2">
                            {news.excerpt}
                          </p>
                        </div>
                      </article>
                    ))}
                    <div className="pt-4 text-center">
                      <button className="text-[#1565C0] font-medium text-sm flex items-center gap-2 mx-auto hover:gap-3 transition-all">
                        Lihat Semua Berita <ArrowRight size={14} />
                      </button>
                    </div>
                  </div>
                )}

                {activeTab === 'agenda' && (
                  <div className="space-y-4">
                    {[
                      { title: "Rapat Komite Sekolah", date: "15", month: "Okt", time: "09:00 - Selesai" },
                      { title: "Ujian Tengah Semester Ganjil", date: "23", month: "Okt", time: "07:30 - 12:00" },
                      { title: "Peringatan Hari Pahlawan", date: "10", month: "Nov", time: "08:00 - 10:00" },
                    ].map((agenda, i) => (
                      <div key={i} className="flex bg-slate-50 rounded-lg p-4 border border-slate-100 hover:border-blue-200 transition">
                        <div className="w-16 h-16 bg-white rounded-lg shadow-sm flex flex-col items-center justify-center flex-shrink-0 text-center border border-slate-200">
                          <span className="text-xs font-semibold text-slate-500 uppercase">{agenda.month}</span>
                          <span className="text-xl font-bold text-[#1565C0]">{agenda.date}</span>
                        </div>
                        <div className="ml-4 flex flex-col justify-center">
                          <h4 className="font-semibold text-slate-800">{agenda.title}</h4>
                          <span className="text-xs text-slate-500 flex items-center gap-1 mt-1"><Clock size={12} /> {agenda.time}</span>
                        </div>
                      </div>
                    ))}
                  </div>
                )}
                
                {/* Fallback for other tabs */}
                {(activeTab === 'kategori' || activeTab === 'komentar') && (
                  <div className="text-center py-12 text-slate-500">
                    <MessageSquare size={32} className="mx-auto mb-3 text-slate-300" />
                    <p>Konten {activeTab} akan segera tersedia.</p>
                  </div>
                )}
              </div>
            </div>
            
            {/* Gallery Preview */}
            <div className="bg-white p-6 rounded-xl shadow-sm border border-slate-100">
              <div className="flex justify-between items-center mb-6">
                <h3 className="text-lg font-bold text-slate-800">Galeri Terbaru</h3>
                <a href="#" className="text-sm text-[#1565C0] hover:underline">Lihat Semua</a>
              </div>
              <div className="grid grid-cols-2 sm:grid-cols-4 gap-4">
                {[1, 2, 3, 4].map((i) => (
                  <div key={i} className="aspect-square bg-slate-100 rounded-lg cursor-pointer hover:opacity-80 transition relative overflow-hidden group">
                    <div className="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 bg-[#1565C0]/80 transition-opacity">
                      <Search className="text-white" />
                    </div>
                  </div>
                ))}
              </div>
            </div>
            
          </div>

          {/* Right Column - Sidebar */}
          <div className="space-y-6">
            
            {/* E-Learning Login Widget */}
            <div className="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
              <div className="bg-slate-50 border-b border-slate-100 px-5 py-4">
                <h3 className="font-bold text-slate-800 flex items-center gap-2">
                  <Lock size={16} className="text-[#1565C0]" /> Login E-Learning
                </h3>
              </div>
              <div className="p-5 space-y-4">
                <div className="space-y-1">
                  <label className="text-xs font-medium text-slate-600 block">Username / NISN</label>
                  <input type="text" className="w-full border border-slate-200 rounded-md px-3 py-2 text-sm focus:outline-none focus:border-[#1565C0] focus:ring-1 focus:ring-[#1565C0]" placeholder="Masukkan username" />
                </div>
                <div className="space-y-1">
                  <label className="text-xs font-medium text-slate-600 block">Password</label>
                  <input type="password" className="w-full border border-slate-200 rounded-md px-3 py-2 text-sm focus:outline-none focus:border-[#1565C0] focus:ring-1 focus:ring-[#1565C0]" placeholder="••••••••" />
                </div>
                <button className="w-full bg-[#1565C0] hover:bg-[#0D47A1] text-white py-2 rounded-md text-sm font-medium transition shadow-sm">
                  Masuk Sistem
                </button>
              </div>
            </div>

            {/* Polling Widget */}
            <div className="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
              <div className="bg-slate-50 border-b border-slate-100 px-5 py-4">
                <h3 className="font-bold text-slate-800 flex items-center gap-2">
                  <MessageSquare size={16} className="text-[#1565C0]" /> Polling
                </h3>
              </div>
              <div className="p-5">
                <p className="text-sm text-slate-700 font-medium mb-4">Bagaimana pendapat Anda tentang fasilitas website ini?</p>
                <div className="space-y-3">
                  {['Sangat Baik', 'Baik', 'Cukup', 'Kurang'].map((option, i) => (
                    <label key={i} className="flex items-center gap-3 cursor-pointer group">
                      <div className="w-4 h-4 rounded-full border border-slate-300 group-hover:border-[#1565C0] flex items-center justify-center transition-colors">
                        {i === 0 && <div className="w-2 h-2 rounded-full bg-[#1565C0]"></div>}
                      </div>
                      <span className="text-sm text-slate-600">{option}</span>
                    </label>
                  ))}
                </div>
                <div className="mt-5 flex gap-2">
                  <button className="flex-1 bg-slate-800 hover:bg-slate-700 text-white py-2 rounded-md text-xs font-medium transition shadow-sm">
                    Kirim Jawaban
                  </button>
                  <button className="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-600 py-2 rounded-md text-xs font-medium transition">
                    Lihat Hasil
                  </button>
                </div>
              </div>
            </div>

            {/* Quick Links */}
            <div className="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
              <div className="bg-slate-50 border-b border-slate-100 px-5 py-4">
                <h3 className="font-bold text-slate-800">Tautan Penting</h3>
              </div>
              <div className="p-2">
                {[
                  'Kemdikbud', 'Dinas Pendidikan Prov', 'Dinas Pendidikan Kota', 'Portal Bantuan'
                ].map((link, i) => (
                  <a key={i} href="#" className="flex items-center gap-2 p-3 text-sm text-slate-600 hover:bg-slate-50 hover:text-[#1565C0] rounded-lg transition group">
                    <ChevronRight size={14} className="text-slate-400 group-hover:text-[#1565C0]" />
                    {link}
                  </a>
                ))}
              </div>
            </div>

          </div>
        </div>
      </main>

      {/* Footer */}
      <footer className="bg-slate-900 text-slate-300 pt-16 pb-8 border-t-4 border-[#1565C0]">
        <div className="container mx-auto px-4">
          <div className="grid md:grid-cols-3 gap-8 mb-12">
            <div>
              <div className="flex items-center gap-2 mb-6">
                <div className="text-3xl">🏫</div>
                <h2 className="text-xl font-bold text-white">SMPN 2 Binjai</h2>
              </div>
              <p className="text-sm leading-relaxed mb-6 text-slate-400">
                Lembaga pendidikan tingkat menengah yang berkomitmen mencetak generasi cerdas, berkarakter, dan berbudaya lingkungan.
              </p>
            </div>
            
            <div>
              <h3 className="text-white font-bold mb-6 uppercase tracking-wider text-sm">Kontak Kami</h3>
              <ul className="space-y-4 text-sm">
                <li className="flex gap-3">
                  <MapPin size={18} className="text-[#1565C0] shrink-0" />
                  <span>Jl. Sultan Hasanuddin No.10, Binjai Kota, Binjai, Sumatera Utara 20714</span>
                </li>
                <li className="flex items-center gap-3">
                  <Phone size={18} className="text-[#1565C0]" />
                  <span>061-9631740</span>
                </li>
                <li className="flex items-center gap-3">
                  <Mail size={18} className="text-[#1565C0]" />
                  <span>info@smpn2binjai.sch.id</span>
                </li>
              </ul>
            </div>
            
            <div>
              <h3 className="text-white font-bold mb-6 uppercase tracking-wider text-sm">Lokasi</h3>
              <div className="h-40 bg-slate-800 rounded-lg overflow-hidden border border-slate-700 relative">
                {/* Map placeholder */}
                <div className="absolute inset-0 flex items-center justify-center flex-col text-slate-500">
                  <MapPin size={24} className="mb-2" />
                  <span className="text-xs">Peta Lokasi Google Maps</span>
                </div>
              </div>
            </div>
          </div>
          
          <div className="pt-8 border-t border-slate-800 text-sm flex flex-col md:flex-row justify-between items-center gap-4 text-slate-500">
            <p>&copy; {new Date().getFullYear()} SMP Negeri 2 Binjai. All rights reserved.</p>
            <div className="flex gap-4">
              <a href="#" className="hover:text-white transition">Kebijakan Privasi</a>
              <a href="#" className="hover:text-white transition">Syarat & Ketentuan</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  );
}
