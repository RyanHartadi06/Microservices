import Head from "next/head";

import axios from "src/configs/axios";

import Circle from "public/images/circle-accent-1.svg";

import Header from "src/parts/Header";
import Hero from "src/parts/Hero";

function Home({ data }) {
  return (
    <>
      <Head>
        <title>BWAMICRO</title>
        {/* <link rel="icon" href="/favicon.ico" /> */}
      </Head>

      <main>
        <section className="header-clipping pt-10 min-h-screen md:min-h-0">
          <div className="sunshine max-w-full"></div>
          <Circle className="absolute left-0 bottom-0"></Circle>
          <div className="container mx-auto px-4">
            <Header></Header>
            <Hero></Hero>
          </div>
        </section>
      </main>
    </>
  );
}

export default Home;
