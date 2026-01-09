
import React from 'react';
import { motion } from 'framer-motion';
import { Users, Briefcase, TrendingUp, ChevronRight } from 'lucide-react';

const Services = () => {
  const services = [
    {
      icon: Users,
      title: "Recruiting & Workforce Solutions",
      description: "Elite talent acquisition and strategic workforce planning for AI infrastructure projects",
      features: [
        "Executive search and placement",
        "Technical talent sourcing",
        "Contractor network access",
        "Skills assessment and matching"
      ]
    },
    {
      icon: Briefcase,
      title: "Managed Services Contracts",
      description: "End-to-end project management and operational oversight for data center deployments",
      features: [
        "Project lifecycle management",
        "Quality assurance protocols",
        "Resource allocation optimization",
        "Performance monitoring"
      ]
    },
    {
      icon: TrendingUp,
      title: "Advisory & Optimization",
      description: "Strategic consulting to maximize efficiency and performance in AI infrastructure operations",
      features: [
        "Infrastructure strategy development",
        "Operational efficiency audits",
        "Technology roadmap planning",
        "Risk mitigation strategies"
      ]
    }
  ];

  return (
    <section className="py-24 bg-gradient-to-b from-slate-900/50 to-slate-950 relative overflow-hidden">
      <div className="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-cyan-500 to-transparent" />
      
      {/* Services Content */}
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.6 }}
          className="text-center mb-16"
        >
          <h2 className="text-4xl sm:text-5xl font-bold mb-6 bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">
            Core Offerings
          </h2>
          <p className="text-xl text-slate-300 max-w-3xl mx-auto">
            Comprehensive solutions for AI data center staffing and operational excellence
          </p>
        </motion.div>

        <div className="space-y-8">
          {services.map((service, index) => (
            <motion.div
              key={index}
              initial={{ opacity: 0, x: -30 }}
              whileInView={{ opacity: 1, x: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.6, delay: index * 0.2 }}
              className="group"
            >
              <div className="p-8 bg-gradient-to-r from-slate-900/80 to-slate-800/80 border border-slate-700 rounded-2xl backdrop-blur-sm hover:border-cyan-500/50 transition-all">
                <div className="flex flex-col lg:flex-row gap-8">
                  <div className="flex-shrink-0">
                    <div className="p-6 bg-gradient-to-br from-cyan-500/20 to-blue-600/20 rounded-xl border border-cyan-500/30 group-hover:scale-110 transition-transform">
                      <service.icon className="w-12 h-12 text-cyan-400" />
                    </div>
                  </div>
                  
                  <div className="flex-grow">
                    <h3 className="text-3xl font-bold mb-4 text-white">{service.title}</h3>
                    <p className="text-lg text-slate-300 mb-6">{service.description}</p>
                    
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-3">
                      {service.features.map((feature, idx) => (
                        <motion.div
                          key={idx}
                          whileHover={{ x: 5 }}
                          className="flex items-center gap-2 text-slate-400 hover:text-cyan-400 transition-colors"
                        >
                          <ChevronRight className="w-4 h-4 text-cyan-500" />
                          <span>{feature}</span>
                        </motion.div>
                      ))}
                    </div>
                  </div>
                </div>
              </div>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
};

export default Services;
