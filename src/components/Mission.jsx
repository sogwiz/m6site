import React from 'react';
import { motion } from 'framer-motion';
import { Target, TrendingUp, Shield } from 'lucide-react';

const Mission = () => {
  const pillars = [
    {
      icon: Target,
      title: "Precision Matching",
      description: "Connect the right talent with the right mission-critical projects"
    },
    {
      icon: TrendingUp,
      title: "Operational Excellence",
      description: "Deliver unparalleled results through expert staffing and management"
    },
    {
      icon: Shield,
      title: "Infrastructure Integrity",
      description: "Ensure reliability and performance in every AI data center deployment"
    }
  ];

  return (
    <section className="py-24 bg-slate-900/50 relative overflow-hidden">
      <div className="absolute inset-0 bg-gradient-to-b from-transparent via-blue-950/20 to-transparent" />
      
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.6 }}
          className="text-center mb-16"
        >
          <h2 className="text-4xl sm:text-5xl font-bold mb-6 bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">
            Our Core Mission
          </h2>
          <p className="text-xl text-slate-300 max-w-3xl mx-auto">
            Powering the future of AI infrastructure with world-class talent and operational expertise
          </p>
        </motion.div>

        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          {pillars.map((pillar, index) => (
            <motion.div
              key={index}
              initial={{ opacity: 0, y: 30 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.6, delay: index * 0.2 }}
              whileHover={{ y: -10, transition: { duration: 0.3 } }}
              className="p-8 bg-gradient-to-br from-slate-800/50 to-slate-900/50 border border-cyan-500/20 rounded-xl backdrop-blur-sm hover:border-cyan-500/40 transition-all"
            >
              <div className="mb-6 inline-block p-4 bg-gradient-to-br from-cyan-500/20 to-blue-600/20 rounded-lg">
                <pillar.icon className="w-8 h-8 text-cyan-400" />
              </div>
              <h3 className="text-2xl font-bold mb-4 text-white">{pillar.title}</h3>
              <p className="text-slate-400 leading-relaxed">{pillar.description}</p>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
};

export default Mission;