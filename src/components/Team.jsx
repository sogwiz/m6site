
import React from 'react';
import { motion } from 'framer-motion';
import { UserCheck, Zap, Hammer, Code, Package, Briefcase } from 'lucide-react';

const Team = () => {
  const roles = [
    {
      icon: UserCheck,
      title: "Sr Technical Recruiter",
      description: "Sourcing top-tier talent for mission-critical infrastructure roles"
    },
    {
      icon: Zap,
      title: "Hydropower Engineer",
      description: "Optimizing sustainable energy solutions for data center operations"
    },
    {
      icon: Hammer,
      title: "PMP Director",
      description: "Leading complex multi-site buildout and deployment projects"
    },
    {
      icon: Code,
      title: "Software Dev Leader",
      description: "Architecting scalable systems and automation frameworks"
    },
    {
      icon: Package,
      title: "Product Manager",
      description: "Driving innovation and strategic product development"
    },
    {
      icon: Briefcase,
      title: "Chief Commercial Officer",
      description: "Expanding partnerships and commercial growth strategies"
    }
  ];

  return (
    <section className="py-24 bg-slate-950 relative overflow-hidden">
      <div className="absolute inset-0">
        <div className="absolute top-1/4 left-0 w-96 h-96 bg-cyan-500/10 rounded-full blur-3xl" />
        <div className="absolute bottom-1/4 right-0 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl" />
      </div>

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
              Leadership Team
            </span>
          </h2>
          <p className="text-xl text-slate-300 max-w-3xl mx-auto">
            Specialized roles driving precision staffing and operational excellence
          </p>
        </motion.div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          {roles.map((role, index) => (
            <motion.div
              key={index}
              initial={{ opacity: 0, y: 30 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.5, delay: index * 0.1 }}
              whileHover={{ y: -10 }}
              className="relative group"
            >
              <div className="absolute inset-0 bg-gradient-to-br from-cyan-500/20 to-blue-600/20 rounded-xl blur-xl opacity-0 group-hover:opacity-100 transition-opacity" />
              <div className="relative p-6 bg-slate-900/80 border border-slate-700 rounded-xl backdrop-blur-sm group-hover:border-cyan-500/50 transition-all h-full flex flex-col">
                <div className="mb-4 inline-block p-3 bg-gradient-to-br from-cyan-500/10 to-blue-600/10 rounded-lg border border-cyan-500/20">
                  <role.icon className="w-8 h-8 text-cyan-400" />
                </div>
                <h3 className="text-xl font-bold mb-3 text-white">{role.title}</h3>
                <p className="text-slate-400 text-sm flex-grow">{role.description}</p>
              </div>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
};

export default Team;
