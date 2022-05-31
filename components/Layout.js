import styles from "../styles/Layout.module.css";

const Layout = ({ children }) => {
  return (
    <div className={styles.layout}>
      <div className={styles.border}>
          {children}
      </div>
    </div>
  );
};

export default Layout;
