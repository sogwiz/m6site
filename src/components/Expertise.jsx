import React from 'react';
import { motion } from 'framer-motion';
import { Cpu, Zap, Wrench, Globe, Building2, Network } from 'lucide-react';

const Expertise = () => {
  const partners = [
    {
      icon: Cpu,
      title: "Technology",
      description: "Cutting-edge AI and data center technology expertise",
      color: "from-cyan-500 to-blue-600"
    },
    {
      icon: Zap,
      title: "Energy",
      description: "Sustainable power solutions and energy optimization",
      color: "from-blue-500 to-indigo-600"
    },
    {
      icon: Wrench,
      title: "Engineering",
      description: "Advanced infrastructure design and implementation",
      color: "from-cyan-500 to-teal-600"
    },
    {
      icon: Globe,
      title: "Global Operations",
      description: "Worldwide deployment and operational management",
      color: "from-blue-500 to-cyan-600"
    },
    {
      icon: Building2,
      title: "Business Strategy",
      description: "Strategic planning and business development",
      color: "from-indigo-500 to-blue-600"
    },
    {
      icon: Network,
      title: "Infrastructure",
      description: "Large-scale data center buildout expertise",
      color: "from-teal-500 to-cyan-600"
    }
  ];

  return (
    <section className="py-24 bg-slate-950 relative overflow-hidden">
      <div className="absolute inset-0 opacity-10"
        style={{
          backgroundImage: `radial-gradient(circle at 2px 2px, rgba(14, 165, 233, 0.15) 1px, transparent 0)`,
          backgroundSize: '40px 40px'
        }}
      />

      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.6 }}
          className="text-center mb-16"
        >
          <h2 className="text-4xl sm:text-5xl font-bold mb-6">
            <span className="bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">
              Managing Partners
            </span>
            <br />
            <span className="text-white">Expertise Areas</span>
          </h2>
          <p className="text-xl text-slate-300 max-w-3xl mx-auto">
            Six specialized domains of excellence driving AI infrastructure innovation
          </p>
        </motion.div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          {partners.map((partner, index) => (
            <motion.div
              key={index}
              initial={{ opacity: 0, scale: 0.9 }}
              whileInView={{ opacity: 1, scale: 1 }}
              viewport={{ once: true }}
              transition={{ duration: 0.5, delay: index * 0.1 }}
              whileHover={{ scale: 1.05, transition: { duration: 0.2 } }}
              className="relative group"
            >
              <div className="absolute inset-0 bg-gradient-to-r opacity-0 group-hover:opacity-100 blur-xl transition-opacity duration-300"
                style={{ backgroundImage: `linear-gradient(to right, var(--tw-gradient-stops))` }}
                className={`bg-gradient-to-r ${partner.color}`}
              />
              <div className="relative p-8 bg-slate-900/80 border border-slate-700 rounded-xl backdrop-blur-sm group-hover:border-cyan-500/50 transition-all">
                <div className={`mb-6 inline-block p-4 bg-gradient-to-r ${partner.color} rounded-lg shadow-lg`}>
                  <partner.icon className="w-8 h-8 text-white" />
                </div>
                <h3 className="text-2xl font-bold mb-3 text-white">{partner.title}</h3>
                <p className="text-slate-400">{partner.description}</p>
              </div>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
};

export default Expertise;