module.exports = (sequelize, DataTypes) => {
  const Order = sequelize.define(
    "Order",
    {
      id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        primaryKey: true,
        allowNUll: false,
      },
      status: {
        type: DataTypes.STRING,
        default: "pending",
      },
      course_id: {
        type: DataTypes.INTEGER,
        allowNUll: false,
      },
      user_id: {
        type: DataTypes.INTEGER,
        allowNUll: false,
      },
      snap_url: {
        type: DataTypes.STRING,
        allowNUll: true,
      },
      meta_data: {
        type: DataTypes.JSON,
        allowNUll: true,
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
      tableName: "order",
      timestamps: true,
    }
  );
  return Order;
};
