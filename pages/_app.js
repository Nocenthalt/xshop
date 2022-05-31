import '@styles/globals.css'
import '@styles/reset.css'
import Layout from '@components/Layout'

function Application({ Component, pageProps }) {
  return (
    <Layout>
      <Component {...pageProps} />
    </Layout>
  )
}

export default Application
