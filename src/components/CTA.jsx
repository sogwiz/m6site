
import React from 'react';
import { motion } from 'framer-motion';
import { ArrowRight, Mail, Linkedin } from 'lucide-react';

const CTA = ({ showLinkedIn = true, showMetrics = true }) => {
  return (
    <section className="py-24 bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 relative overflow-hidden">
      <div className="absolute inset-0 opacity-20"
        style={{
          backgroundImage: `linear-gradient(rgba(14, 165, 233, 0.1) 1px, transparent 1px),
                           linear-gradient(90deg, rgba(14, 165, 233, 0.1) 1px, transparent 1px)`,
          backgroundSize: '50px 50px'
        }}
      />

      <motion.div
        className="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-cyan-500 to-transparent"
        animate={{
          x: ['-100%', '100%']
        }}
        transition={{
          duration: 3,
          repeat: Infinity,
          ease: "linear"
        }}
      />

      <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.6 }}
        >
          <h2 className="text-4xl sm:text-5xl font-bold mb-6 bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">
            Ready to Build the Future?
          </h2>
          <p className="text-xl text-slate-300 mb-12 max-w-2xl mx-auto">
            Join our network of elite contractors and connect with mission-critical AI data center projects worldwide
          </p>

          <div className="flex flex-col sm:flex-row gap-6 justify-center mb-12">
            <motion.a
              href="mailto:info@6mindsinfra.com"
              whileHover={{ scale: 1.05 }}
              whileTap={{ scale: 0.95 }}
              className="group px-8 py-4 bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-semibold rounded-lg shadow-lg shadow-cyan-500/50 hover:shadow-cyan-500/70 transition-all flex items-center justify-center gap-2"
            >
              <Mail className="w-5 h-5" />
              Contact Our Team
              <ArrowRight className="w-5 h-5 group-hover:translate-x-1 transition-transform" />
            </motion.a>
            
            {showLinkedIn && (
              <motion.button
                whileHover={{ scale: 1.05 }}
                whileTap={{ scale: 0.95 }}
                className="px-8 py-4 bg-slate-800/50 border border-cyan-500/30 text-cyan-400 font-semibold rounded-lg backdrop-blur-sm hover:bg-slate-800/80 transition-all flex items-center justify-center gap-2"
              >
                <Linkedin className="w-5 h-5" />
                Connect on LinkedIn
              </motion.button>
            )}
          </div>

          {showMetrics && (
            <motion.div
              initial={{ opacity: 0 }}
              whileInView={{ opacity: 1 }}
              viewport={{ once: true }}
              transition={{ duration: 0.6, delay: 0.3 }}
              className="grid grid-cols-1 sm:grid-cols-3 gap-8 pt-12 border-t border-slate-700"
            >
              <div>
                <div className="text-3xl font-bold text-cyan-400 mb-2">500+</div>
                <div className="text-slate-400">Elite Contractors</div>
              </div>
              <div>
                <div className="text-3xl font-bold text-cyan-400 mb-2">50+</div>
                <div className="text-slate-400">Active Projects</div>
              </div>
              <div>
                <div className="text-3xl font-bold text-cyan-400 mb-2">Your Vision</div>
                <div className="text-slate-400">Our Blueprint</div>
              </div>
            </motion.div>
          )}
        </motion.div>
      </div>
    </section>
  );
};

export default CTA;
