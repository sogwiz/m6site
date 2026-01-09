
import React from 'react';
import { Routes, Route, useLocation } from 'react-router-dom';
import { Helmet } from 'react-helmet';
import { Toaster } from '@/components/ui/toaster';
import Navbar from '@/components/Navbar';
import Hero from '@/components/Hero';
import Mission from '@/components/Mission';
import Expertise from '@/components/Expertise';
import Services from '@/components/Services';
import Team from '@/components/Team';
import CTA from '@/components/CTA';
import Footer from '@/components/Footer';

// Component to scroll to top on route change
const ScrollToTop = () => {
  const { pathname } = useLocation();
  React.useEffect(() => {
    window.scrollTo(0, 0);
  }, [pathname]);
  return null;
};

function App() {
  return (
    <>
      <Helmet>
        <title>Elite AI Data Center Staffing | Infrastructure Specialists</title>
        <meta name="description" content="Connecting elite contractors with mission-critical AI data center buildouts and operations. Precision staffing and operational excellence for the future of infrastructure." />
      </Helmet>
      
      <div className="min-h-screen bg-slate-950 text-white overflow-x-hidden flex flex-col">
        <Navbar />
        <ScrollToTop />
        
        <main className="flex-grow">
          <Routes>
            {/* HOME PAGE */}
            <Route path="/" element={
              <>
                <Hero />
                <Mission />
                <Services /> {/* Core Offerings kept on Home to provide context */}
              </>
            } />

            {/* ABOUT PAGE */}
            <Route path="/about" element={
              <div className="pt-20">
                <div className="bg-slate-950 py-16 text-center px-4">
                  <h1 className="text-4xl md:text-5xl font-bold mb-6">About Us</h1>
                  <p className="text-xl text-slate-400 max-w-2xl mx-auto">
                    Building the future of AI infrastructure through elite talent and strategic partnerships.
                  </p>
                </div>
                <Expertise />
                <Team />
                <CTA showLinkedIn={false} showMetrics={false} />
              </div>
            } />

            {/* JOBS PAGE */}
            <Route path="/jobs" element={
              <div className="pt-20">
                <CTA />
              </div>
            } />
          </Routes>
        </main>

        <Footer />
        <Toaster />
      </div>
    </>
  );
}

export default App;
