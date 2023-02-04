module.exports = (sequelize, DataTypes) => {
  const PaymentLog = sequelize.define(
    "PaymentLog",
    {
      id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        primaryKey: true,
        allowNUll: false,
      },
      order_id: {
        type: DataTypes.INTEGER,
        allowNUll: false,
      },
      status: {
        type: DataTypes.STRING,
        allowNUll: false,
      },
      payment_type: {
        type: DataTypes.STRING,
        allowNUll: false,
      },
      raw_response: {
        type: DataTypes.JSON,
        allowNUll: false,
      },
      createdAt: {
        type: DataTypes.DATE,
        field: "created_at",
        allowNUll: false,
      },
      updatedAt: {
        type: DataTypes.DATE,
        field: "updated_at",
        allowNUll: false,
      },
    },
    {
      tableName: "payment_logs",
      timestamps: true,
    }
  );
  return PaymentLog;
};
