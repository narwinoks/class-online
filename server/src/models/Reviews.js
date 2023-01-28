module.exports = (sequelize, DataTypes) => {
  const Reviews = sequelize.define(
    "Reviews",
    {
      id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        primaryKey: true,
        allowNUll: false,
      },
      user_id: {
        type: DataTypes.INTEGER,
        allowNUll: false,
      },
      courses_id: {
        type: DataTypes.INTEGER,
        allowNUll: false,
      },
      video: {
        type: DataTypes.STRING,
        allowNUll: false,
      },
      rating: {
        type: DataTypes.INTEGER,
        allowNUll: false,
      },
      note: {
        type: DataTypes.TEXT,
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
      tableName: "reviews",
      timestamps: true,
    }
  );
  return Reviews;
};