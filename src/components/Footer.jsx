
import React from 'react';
import { motion } from 'framer-motion';
import { Mail, MapPin, Phone } from 'lucide-react'; 
const Footer = () => {
  const currentYear = new Date().getFullYear();
  return <footer className="bg-slate-950 border-t border-slate-800 relative overflow-hidden">
      <div className="absolute inset-0 bg-gradient-to-b from-blue-950/20 to-transparent pointer-events-none" />
      
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative z-10">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
          <div>
            <div className="flex items-center gap-2 mb-4">
              <div className="p-1.5 rounded-lg"> 
                <img src="/6-minds-infrastructure-logo.png" alt="6 Minds Infrastructure Logo" className="w-6 h-6 object-contain" 
              />
              </div>
              <span className="text-xl font-bold text-white">6 Minds Infra</span>
            </div>
            <p className="text-slate-400 text-sm mb-4">
              Elite staffing solutions for mission-critical AI data center operations worldwide
            </p>
          </div>

          <div>
            <span className="text-white font-semibold mb-4 block">Services</span>
            <ul className="space-y-2 text-slate-400 text-sm">
              <li className="hover:text-cyan-400 transition-colors cursor-pointer">Recruiting</li>
              <li className="hover:text-cyan-400 transition-colors cursor-pointer">Managed Services</li>
              <li className="hover:text-cyan-400 transition-colors cursor-pointer">Advisory</li>
              <li className="hover:text-cyan-400 transition-colors cursor-pointer">Optimization</li>
            </ul>
          </div>

          <div>
            <span className="text-white font-semibold mb-4 block">Expertise</span>
            <ul className="space-y-2 text-slate-400 text-sm">
              <li className="hover:text-cyan-400 transition-colors cursor-pointer">Technology</li>
              <li className="hover:text-cyan-400 transition-colors cursor-pointer">Energy</li>
              <li className="hover:text-cyan-400 transition-colors cursor-pointer">Engineering</li>
              <li className="hover:text-cyan-400 transition-colors cursor-pointer">Global Operations</li>
            </ul>
          </div>

          <div>
            <span className="text-white font-semibold mb-4 block">Contact</span>
            <ul className="space-y-3 text-slate-400 text-sm">
              <li className="flex items-center gap-2 hover:text-cyan-400 transition-colors">
                <Mail className="w-4 h-4" />
                <span>info@6mindsinfra.com</span>
              </li>
              <li className="flex items-center gap-2 hover:text-cyan-400 transition-colors">
                <Phone className="w-4 h-4" />
                <span></span>
              </li>
              <li className="flex items-center gap-2 hover:text-cyan-400 transition-colors">
                <MapPin className="w-4 h-4" />
                <span>Texas</span>
              </li>
            </ul>
          </div>
        </div>

        <div className="pt-8 border-t border-slate-800">
          <div className="flex flex-col sm:flex-row justify-between items-center gap-4">
            <p className="text-slate-400 text-sm">
              © {currentYear} 6 Minds Infrastructure, LLC. All rights reserved.
            </p>
            <div className="flex gap-6 text-slate-400 text-sm">
              <span className="hover:text-cyan-400 transition-colors cursor-pointer">Privacy Policy</span>
              <span className="hover:text-cyan-400 transition-colors cursor-pointer">Terms of Service</span>
              <span className="hover:text-cyan-400 transition-colors cursor-pointer">Careers</span>
            </div>
          </div>
        </div>
      </div>
    </footer>;
};
export default Footer;
